<?php

namespace App\Filament\Doctor\Resources;

use App\Filament\Doctor\Resources\ConversationResource\Pages;
use App\Filament\Doctor\Resources\ConversationResource\RelationManagers;
use App\Models\Base\Conversation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConversationResource extends Resource
{
    protected static ?string $model = Conversation::class;

    protected static ?string $navigationIcon = 'icon-messenger';

    protected static Authenticatable $doctor;
    public static function getEloquentQuery(): Builder
    {
        self::$doctor = $doctor =  auth('doctor')->user();

        $query  = Conversation::query()
            ->where(function(Builder $builder) use ($doctor){
                return $builder->where('source_conversationable_type', get_class($doctor))
                    ->where('source_conversationable_id', $doctor->id);
            })->orWhere(function(Builder $builder) use($doctor){
                return $builder->where('target_conversationable_type', get_class($doctor))
                    ->where('target_conversationable_id', $doctor->id);
            });
        return $query;
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
                Tables\Columns\TextColumn::make('sender.name')
                    ->label('with')
                    ->default('null')
                    ->formatStateUsing(function(Conversation $record){
                        $user = $record->getOtherParticipant(auth('doctor')->user());
                        return $user->name;
                    }),

                Tables\Columns\TextColumn::make('is online')
                    ->default('not online')
                    ->formatStateUsing(function(Model $record){
                        return $record->getOtherParticipant(auth('doctor')->user())->is_online ? 'online' : 'not online';
                    })
                    ->badge()
                    ->color(function(string $state){
                        return match ($state){
                            'online' => Color::Green ,
                            default => Color::Red
                        };
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('chatting')
                    ->label('chatting')
                    ->icon('heroicon-o-chat-bubble-oval-left')
                    ->url( function(Model $record){
                        return url(route('filament.doctor.resources.conversations.inbox', ['record' => $record->id]));
                    }),
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
            'index' => Pages\ListConversations::route('/'),
            'create' => Pages\CreateConversation::route('/create'),
            'edit' => Pages\EditConversation::route('/{record}/edit'),
            'inbox' => Pages\Conversations::route('/{record}/inbox')
        ];
    }
}
