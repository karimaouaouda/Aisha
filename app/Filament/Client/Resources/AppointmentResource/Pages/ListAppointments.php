<?php

namespace App\Filament\Patient\Resources\AppointmentResource\Pages;

use App\Filament\Patient\Resources\AppointmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppointments extends ListRecords
{
    protected static string $resource = AppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
