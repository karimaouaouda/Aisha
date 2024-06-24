<?php

namespace App\Filament\Patient\Resources\DoctorResource\Pages;

use App\Filament\Patient\Resources\DoctorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDoctor extends CreateRecord
{
    protected static string $resource = DoctorResource::class;
}
