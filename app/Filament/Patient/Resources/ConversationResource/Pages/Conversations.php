<?php

namespace App\Filament\Patient\Resources\ConversationResource\Pages;

use App\Filament\Patient\Resources\ConversationResource;
use App\Models\Auth\Doctor;
use App\Models\Auth\Patient;
use Filament\Resources\Pages\Page;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Conversations extends Page
{
    protected static string $resource = ConversationResource::class;

    protected ?string $heading = 'inbox';

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
            'user' => auth('patient')->user(),
            'other' => $this->record->getOtherParticipant(auth('patient')->user())
        ];
    }


}
