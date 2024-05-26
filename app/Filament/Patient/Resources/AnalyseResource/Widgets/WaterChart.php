<?php

namespace App\Filament\Patient\Resources\AnalyseResource\Widgets;

use App\Services\Datasets\WaterService;
use Carbon\Month;
use Filament\Widgets\ChartWidget;

class WaterChart extends ChartWidget
{
    protected static ?string $heading = 'water drinked by you';

    protected function getData(): array
    {

        $d = WaterService::generate(10);
        return [
            'datasets' => [
                [
                    'label' => 'water drinked (l)',
                    'data' => $d['data'],
                ],
            ],
            'labels' => $d['labels'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
