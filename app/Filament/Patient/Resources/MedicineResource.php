<?php

namespace App\Filament\Patient\Resources;

use App\Filament\Patient\Resources\MedicineResource\Pages;
use App\Filament\Patient\Resources\MedicineResource\RelationManagers;
use App\Models\Medicine;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MedicineResource extends Resource
{
    protected static ?string $model = Medicine::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->join('medicine_assignements', 'medicines.id', '=', 'medicine_assignements.medicine')
            ->where('medicine_assignements.patient_id', '=', auth()->user()->id);
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
                Tables\Columns\TextColumn::make('name')
                    ->label('medicine name'),
                Tables\Columns\TextColumn::make('count')
                    ->label('count/day'),
                Tables\Columns\TextColumn::make('method')
                    ->label('method'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            RelationManagers\PatientsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMedicines::route('/'),
            'create' => Pages\CreateMedicine::route('/create'),
            'edit' => Pages\EditMedicine::route('/{record}/edit'),
            'view' => Pages\View::route('/{record}/view'),
        ];
    }
}
