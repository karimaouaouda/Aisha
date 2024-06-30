<?php

namespace App\Filament\Pharmacy\Resources;

use App\Filament\Pharmacy\Resources\MedicineResource\Pages;
use App\Filament\Pharmacy\Resources\MedicineResource\RelationManagers;
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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('medicine name')
                    ->minLength(5)
                    ->maxLength(50)
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->label('medicine description')
                    ->minLength(100)
                    ->maxLength(500)
                    ->required(),

                Forms\Components\FileUpload::make('image')
                    ->disk('public')
                    ->directory('medicines/')
                    ->columnSpan(2)
                    ->label('medicine label'),

                Forms\Components\TextInput::make('price')
                    ->label('medicine price')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('sold')
                    ->label('sold')
                    ->integer()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('medicine name')
                    ->html()
                    ->formatStateUsing(function(Medicine $record){
                        $record->profile_photo_url = $record->image;

                        return view('filament.parts.profile-pic', ['user' => $record]);
                    }),

                Tables\Columns\TextColumn::make('price')
                    ->label('medicine price'),

                Tables\Columns\TextColumn::make('sold')
                    ->label('medicine sold'),

                Tables\Columns\ImageColumn::make('image')
                    ->label('image')
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
            'index' => Pages\ListMedicines::route('/'),
            'create' => Pages\CreateMedicine::route('/create'),
            'edit' => Pages\EditMedicine::route('/{record}/edit'),
        ];
    }
}
