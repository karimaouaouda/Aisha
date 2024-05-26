<?php

namespace App\Filament\Client\Resources\AnalyseResource\Widgets;

use App\Services\Datasets\TemperatureService;
use Filament\Widgets\ChartWidget;

class BodyTemperature extends ChartWidget
{
    protected static ?string $heading = 'temperature over days (days/C)';

    protected function getData(): array
    {
        $d = TemperatureService::generate(10);
        return [
            'datasets' => [
                [
                    'label' => 'temperature',
                    'data' => $d['data'],
                ],
            ],
            'labels' => $d['labels'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
