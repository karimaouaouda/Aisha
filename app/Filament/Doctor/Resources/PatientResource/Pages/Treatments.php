<?php

namespace App\Filament\Doctor\Resources\PatientResource\Pages;

use App\Enums\Base\MedicineTime;
use App\Filament\Doctor\Resources\PatientResource;
use App\Models\Base\Treatment;
use Filament\Actions;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

class Treatments extends ManageRelatedRecords
{
    protected static string $resource = PatientResource::class;

    protected static string $relationship = 'treatments';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'Treatments';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('id'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\Action::make('create treatment')
                    ->label('create treatment')
                    ->form([
                        Forms\Components\Textarea::make('treatment_reason')
                            ->required()
                            ->label('treatment reason'),
                        Forms\Components\Repeater::make('medicines')
                            ->schema([
                                Forms\Components\Select::make('medicine_id')
                                    ->relationship('medicines', 'name'),

                                Forms\Components\TextInput::make('quantity')
                                    ->hint('tell patient the quantity he must buy')
                                    ->required()
                                    ->integer()
                                    ->maxValue(10),

                                Forms\Components\TextInput::make('times_in_day')
                                    ->label('times in day')
                                    ->hint('how much patient must take this medicine')
                                    ->integer()
                                    ->maxValue(20),

                                Forms\Components\Select::make('time')
                                    ->label('when he must take it?')
                                    ->placeholder('chose one')
                                    ->options(MedicineTime::valuesWithKeys())
                            ])->minItems(1),
                    ])
                    ->action(function(array $data){
                        $treatment = new Treatment([
                            'doctor_id' => Filament::auth()->id(),
                            'patient_id' => $this->record->id,
                            'treatment_reason' => $data['treatment_reason']
                        ]);

                        $treatment->save();

                        foreach ($data['medicines'] as $medicine){
                            DB::table('medicine_assignements')
                                ->insert([
                                    'treatment_id' => $treatment->id,
                                    'medicine_id' => $medicine['medicine_id'],
                                    'quantity' => $medicine['quantity'],
                                    'times_in_day' => $medicine['times_in_day'],
                                    'times' => $medicine['time'],
                                    'created_at' => now(),
                                    'updated_at' => now()
                                ]);
                        }

                        Notification::make()
                            ->title('doctor : ' . Filament::auth()->user()->name . ' give you a treatment')
                            ->sendToDatabase($this->record);

                        Notification::make()
                            ->title('treatment created and attached to patient')
                            ->success()
                            ->send();
                    })
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
