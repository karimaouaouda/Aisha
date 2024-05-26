<?php

namespace App\Filament\Patient\Resources\ChatResource\Pages;

use App\Filament\Client\Resources\ChatResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateChat extends CreateRecord
{
    protected static string $resource = ChatResource::class;
}
