<?php

namespace App\Filament\Patient\Resources;

use App\Filament\Patient\Resources\TreatmentResource\Pages;
use App\Filament\Patient\Resources\TreatmentResource\RelationManagers;
use App\Models\Base\Treatment;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use function Pest\Laravel\delete;

class TreatmentResource extends Resource
{
    protected static ?string $model = Treatment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canCreate(): bool
    {
        return false;
    }
    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        return Treatment::query()
                    ->where('patient_id', Filament::auth()->id());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('doctor_id')
                    ->label('from doctor')
                    ->searchable()
                    ->html()
                    ->formatStateUsing(function(Treatment $record){
                        return view('filament.parts.profile-pic', ['user' => $record->doctor]);
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('date of assignment')
                    ->badge()
                    ->color(Color::Sky),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('medicines count')
                    ->badge()
                    ->color(Color::Orange)
                    ->formatStateUsing(function(Treatment $record){
                        return $record->medicines()->count();
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('medicines')
                    ->label('medicines')
                    ->color(Color::Sky)
                    ->url(function(Treatment $record){
                        return Pages\TreatmentMedicines::getUrl([
                            'record' => $record->id
                        ]);
                    })
                    ->icon('heroicon-o-inbox-stack')
                    ->openUrlInNewTab()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
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
            'index' => Pages\ListTreatments::route('/'),
            'create' => Pages\CreateTreatment::route('/create'),
            'edit' => Pages\EditTreatment::route('/{record}/edit'),
        ];
    }
}
