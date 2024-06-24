<?php

namespace App\Filament\Doctor\Resources\PatientResource\Pages;

use App\Filament\Doctor\Resources\PatientResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Colors\Color;

class ListPatients extends ListRecords
{
    protected static string $resource = PatientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('requests')
                ->label('follow request')
                ->icon('heroicon-o-user-group')
                ->url(MedicalRequests::getUrl())
                ->color(Color::Sky)
                ->openUrlInNewTab(),
        ];
    }
}
