<?php

namespace App\Filament\Patient\Resources;

use App\Filament\Patient\Pages\Chat;
use App\Filament\Patient\Resources\Base\ConversationResource\Pages;
use App\Filament\Patient\Resources\ConversationResource\Pages\Conversations;
use App\Models\Auth\Patient;
use App\Models\Base\Conversation;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ConversationResource extends Resource
{
    protected static ?string $model = Conversation::class;

    protected static ?string $navigationIcon = 'icon-messenger';

    public static function getEloquentQuery(): Builder
    {
        $patient = auth('patient')->user();

        $query  = Conversation::query()
                        ->where(function(Builder $builder) use ($patient){
                            return $builder->where('source_conversationable_type', get_class($patient))
                                        ->where('source_conversationable_id', $patient->id);
                        })->orWhere(function(Builder $builder) use($patient){
                            return $builder->where('target_conversationable_type', get_class($patient))
                                ->where('target_conversationable_id', $patient->id);
                        });
        return $query;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sender.name')
                    ->label('with')
                    ->default('null')
                    ->formatStateUsing(function(Model $record){
                        $user = $record->getOtherParticipant(auth('patient')->user());
                        return $user->name;
                    }),

                Tables\Columns\TextColumn::make('is online')
                    ->default('not online')
                    ->formatStateUsing(function(Model $record){
                        return $record->getOtherParticipant(auth('patient')->user())->is_online ? 'online' : 'not online';
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

            ])
            ->actions([
                Tables\Actions\Action::make('chatting')
                    ->label('chatting')
                    ->icon('heroicon-o-chat-bubble-oval-left')
                    ->url( function(Model $record){
                        return url("workspace/conversations/{$record->id}/inbox");
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
            'index' => \App\Filament\Patient\Resources\ConversationResource\Pages\ListConversations::route('/'),
            'create' => \App\Filament\Patient\Resources\ConversationResource\Pages\CreateConversation::route('/create'),
            'edit' => \App\Filament\Patient\Resources\ConversationResource\Pages\EditConversation::route('/{record}/edit'),
            'inbox' => \App\Filament\Patient\Resources\ConversationResource\Pages\Conversations::route('/{record}/inbox'),
            'list' => Conversations::route('/list'),
        ];
    }
}
