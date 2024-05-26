<?php

namespace App\Filament\Patient\Resources\ChatResource\Pages;

use App\Filament\Client\Resources\ChatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChats extends ListRecords
{
    protected static string $resource = ChatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
