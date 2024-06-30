<?php

namespace App\Filament\Client\Resources;

use App\Enums\IOTTopics;
use App\Filament\Patient\Resources\AnalyseResource\Pages;
use App\Models\Analyse;
use App\Models\UserData;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
class AnalyseResource extends Resource
{
    protected static ?string $model = UserData::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('patient_id')
                    ->default(Filament::auth()->id()),

                Forms\Components\Repeater::make('values')
                    ->columnSpan(2)
                    ->schema([
                        Forms\Components\Select::make('topic')
                            ->options(IOTTopics::valuesWithKeys())
                            ->required(),
                        Forms\Components\TextInput::make('data')
                            ->required()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\View::route('/'),
            'create' => Pages\CreateAnalyse::route('/create'),
            'edit' => Pages\EditAnalyse::route('/{record}/edit'),
        ];
    }
}
