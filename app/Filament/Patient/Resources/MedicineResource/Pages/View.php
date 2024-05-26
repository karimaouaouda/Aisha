<?php

namespace App\Filament\Patient\Resources\MedicineResource\Pages;

use App\Filament\Patient\Resources\MedicineResource;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class View extends ManageRelatedRecords
{
    protected static string $resource = MedicineResource::class;

    protected static string $relationship = 'patients';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'Patients';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('patient_id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('patient_id')
            ->columns([
                Tables\Columns\TextColumn::make('patient_id'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make(),
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
