<?php

namespace App\Filament\Pharmacy\Resources\MedicineResource\Pages;

use App\Filament\Pharmacy\Resources\MedicineResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMedicine extends EditRecord
{
    protected static string $resource = MedicineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
