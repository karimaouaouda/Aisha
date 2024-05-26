<?php

namespace App\Filament\Patient\Resources\AnalyseResource\Pages;

use App\Filament\Client\Resources\AnalyseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAnalyse extends EditRecord
{
    protected static string $resource = AnalyseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
