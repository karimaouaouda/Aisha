<?php

namespace App\Filament\Patient\Resources\MedicineResource\Pages;

use App\Filament\Patient\Resources\MedicineResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMedicine extends CreateRecord
{
    protected static string $resource = MedicineResource::class;
}
