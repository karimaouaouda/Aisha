<?php

namespace App\Filament\Patient\Resources;

use App\Enums\AuthRoles;
use App\Filament\Patient\Resources\AppointmentResource\Pages;
use App\Filament\Patient\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use App\Models\Auth\Doctor;
use App\Models\Auth\Patient;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use function Laravel\Prompts\search;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';


    public static function getEloquentQuery(): Builder
    {
        return Appointment::query()
                                ->where("patient_id", "=", Filament::auth()->id())
                                ->orderBy('status');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('patient_id')
                    ->default(Filament::auth()->id()),
                Forms\Components\Hidden::make('requester')
                    ->default(AuthRoles::PATIENT->value),

                Forms\Components\Select::make('doctor_id')
                    ->getSearchResultsUsing(function(){
                        return Filament::auth()->user()->doctors->pluck('name', 'id');
                    })
                    ->placeholder('select doctor')
                    ->selectablePlaceholder(false)
                    ->searchable()
                    ->label('with doctor')
                    ->required(),

                Forms\Components\Textarea::make('reason')
                    ->columnSpan(2)
                    ->label('appointment reason')
                    ->placeholder('i ask for appointment because ...')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->searchable()
            ->columns([
                Tables\Columns\TextColumn::make("doctor.name")
                    ->html()
                    ->label("with doctor")
                    ->html()
                    ->formatStateUsing(function(Appointment $record){
                        return view('filament.parts.profile-pic', ['user' => $record->doctor]);
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('time')
                    ->sortable()
                    ->badge()
                    ->default('unset')
                    ->formatStateUsing(function($state){
                        if($state == 'unset'){
                            return 'waiting doctor descision';
                        }

                        return $state;
                    })
                    ->badge()
                    ->color(function($state){
                        if($state == 'waiting doctor descision' || $state == 'unset'){
                            return Color::Orange;
                        }
                        return Color::Sky;
                    })
                    ->label('appointment time'),

                Tables\Columns\TextColumn::make('requester')
                    ->formatStateUsing(function(string $state){
                        return $state == AuthRoles::PATIENT->value ? "you" : 'doctor';
                    })
                    ->label('Requested By'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make()
                    ->label('cancel')
                    ->form([
                        Forms\Components\Textarea::make('delete_reason')
                            ->label('why do you want to cancel it ?')
                            ->helperText('if you faced a problem with the doctor you can send a complain to the admin')
                            ->placeholder('i cancel the appointment because...')
                            ->required()
                    ])
                    ->action(function(array $data, Appointment $record){
                        $notification = Notification::make()
                            ->title('patient : ' . $record->patient->name . ' cancel the appointment')
                            ->body('because : ' . $data['delete_reason'])
                            ->icon('heroicon-o-exclamation-triangle')
                            ->color(Color::Orange);

                        try{
                            $notification->sendToDatabase($record->doctor);
                            $record->delete();
                        }catch(\Exception $e){
                            Notification::make()
                                ->title('some error occured')
                                ->color(Color::Red)
                                ->body('try to refresh the browser and retry again : ' . $e->getMessage())
                                ->send();
                        }
                    })

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/ask'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
