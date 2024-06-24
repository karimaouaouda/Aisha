<?php

namespace App\Filament\Patient\Resources\AnalyseResource\Widgets;

use App\Services\Datasets\WaterService;
use Carbon\Month;
use Filament\Widgets\ChartWidget;

class WaterChart extends ChartWidget
{
    protected static ?string $heading = 'water drinked by you';

    protected int | string | array $columnSpan = 2;
    protected function getData(): array
    {

        $d1 = WaterService::generate(50);
        $d2 = WaterService::generate(50);
        return [
            'datasets' => [
                [
                    'label' => 'water drunk (l)',
                    'data' => array_map(function($v){
                        return $v * 10;
                    }, $d1['data']),
                ],
                [
                    'label' => 'water drinked (l)',
                    'color' => '#000',
                    'data' => array_map(function($v){
                        return $v * 10;
                    }, $d2['data']),
                ],
            ],
            'labels' => $d1['labels'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
