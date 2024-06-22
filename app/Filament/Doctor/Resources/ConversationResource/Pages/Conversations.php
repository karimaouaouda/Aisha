<?php

namespace App\Filament\Doctor\Resources\ConversationResource\Pages;

use App\Filament\Doctor\Resources\ConversationResource;
use Filament\Resources\Pages\Page;

class Conversations extends Page
{
    protected static string $resource = ConversationResource::class;

    public \App\Models\Base\Conversation $record;

    protected static string $view = 'filament.patient.resources.conversation-resource.pages.conversations';

    public function mount(\App\Models\Base\Conversation $record): void
    {
        $this->record = $record;
    }

    protected function getViewData(): array
    {
        return [
            'conversation' => $this->record,
            'user' => auth('doctor')->user(),
            'other' => $this->record->getOtherParticipant(auth('doctor')->user())
        ];
    }
}
