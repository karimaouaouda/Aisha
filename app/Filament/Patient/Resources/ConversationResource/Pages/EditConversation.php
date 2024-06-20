<?php

namespace App\Filament\Patient\Resources\ConversationResource\Pages;

use App\Filament\Patient\Resources\ConversationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConversation extends EditRecord
{
    protected static string $resource = ConversationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
