<?php

namespace App\Filament\Patient\Resources\ChatResource\Pages;

use App\Filament\Client\Resources\ChatResource;
use Filament\Resources\Pages\Page;

class Chat extends Page
{
    protected static string $resource = ChatResource::class;

    protected function getViewData(): array
    {
        return [
            'messages' => auth()->user()->messages
        ];
    }

    protected static string $view = 'filament.patient.resources.chat-resource.pages.chat';
}
