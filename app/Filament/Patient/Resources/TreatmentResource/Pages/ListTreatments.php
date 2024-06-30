<?php

namespace App\Filament\Patient\Resources\TreatmentResource\Pages;

use App\Filament\Patient\Resources\TreatmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTreatments extends ListRecords
{
    protected static string $resource = TreatmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
