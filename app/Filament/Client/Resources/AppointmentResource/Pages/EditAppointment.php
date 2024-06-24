<?php

namespace App\Filament\Client\Resources\AppointmentResource\Pages;

use App\Filament\Client\Resources\AppointementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppointment extends EditRecord
{
    protected static string $resource = AppointementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
