<?php

namespace App\Filament\Patient\Resources\AppointmentResource\Pages;

use App\Filament\Client\Resources\AppointementResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAppointment extends CreateRecord
{
    protected static string $resource = AppointementResource::class;
}
