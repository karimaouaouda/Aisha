<?php

namespace App\Filament\Doctor\Resources\MedicineResource\Pages;

use App\Filament\Doctor\Resources\MedicineResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMedicine extends CreateRecord
{
    protected static string $resource = MedicineResource::class;
}
