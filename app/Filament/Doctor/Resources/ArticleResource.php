<?php

namespace App\Filament\Doctor\Resources;

use App\Filament\Doctor\Resources\ArticleResource\Pages;
use App\Filament\Doctor\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('doctor_id')
                    ->default(Filament::auth()->id()),

                Forms\Components\FileUpload::make('cover')
                    ->image()
                    ->columnSpan(2)
                    ->required(),

                Forms\Components\TextInput::make('subject')
                    ->required()
                    ->hint('the main of tha article'),

                Forms\Components\TextInput::make('title')
                    ->maxLength(100)
                    ->required()
                    ->hint('this title will be shown in article card'),

                Forms\Components\TextInput::make('sub_title')
                    ->maxLength(100)
                    ->required()
                    ->hint('this sub title will be shown in article card'),

                Forms\Components\Textarea::make('summarize')
                    ->maxLength(500)
                    ->required()
                    ->columnSpan(2)
                    ->hint('this summarize will be shown in article card'),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->maxValue(0.0)
                    ->hintColor(Color::Green)
                    ->hint('if you want it free, just set it to 0')
                    ->numeric(),

                Forms\Components\MarkdownEditor::make('content')
                    ->columnSpan(2)
                    ->required()
                    ->minLength(1000)

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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
