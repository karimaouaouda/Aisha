<?php

namespace App\Filament\Patient\Resources\ChatResource\Pages;

use App\Filament\Client\Resources\ChatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChat extends EditRecord
{
    protected static string $resource = ChatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
