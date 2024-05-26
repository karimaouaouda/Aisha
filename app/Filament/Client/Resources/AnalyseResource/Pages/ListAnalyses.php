<?php

namespace App\Filament\Patient\Resources\AnalyseResource\Pages;

use App\Filament\Client\Resources\AnalyseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAnalyses extends ListRecords
{
    protected static string $resource = AnalyseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
