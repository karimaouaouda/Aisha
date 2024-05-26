<?php

namespace App\Filament\Patient\Resources\AppointmentResource\Pages;

use App\Filament\Patient\Resources\AppointmentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAppointment extends CreateRecord
{
    protected static string $resource = AppointmentResource::class;
}
