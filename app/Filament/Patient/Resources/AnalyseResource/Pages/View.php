<?php

namespace App\Filament\Patient\Resources\AnalyseResource\Pages;

use App\Filament\Patient\Resources\AnalyseResource;
use App\Filament\Patient\Resources\AnalyseResource\Widgets\BodyTemperature;
use App\Filament\Patient\Resources\AnalyseResource\Widgets\StepsWalked;
use App\Filament\Patient\Resources\AnalyseResource\Widgets\WaterChart;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class View extends ManageRecords
{
    protected static string $resource = AnalyseResource::class;


    public function getHeaderWidgetsColumns(): int|string|array
    {
        return 2;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make('upload data')
                ->label('upload data')
        ];
    }


    protected function getHeaderWidgets(): array
    {
        return [
            WaterChart::make(),
            BodyTemperature::make(),
            StepsWalked::make(),
        ];
    }
}
