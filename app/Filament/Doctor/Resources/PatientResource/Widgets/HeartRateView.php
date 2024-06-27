<?php

namespace App\Filament\Doctor\Resources\PatientResource\Widgets;

use Filament\Support\Colors\Color;
use Filament\Widgets\ChartWidget;

class HeartRateView extends ChartWidget
{
    protected static ?string $heading = 'Heart Behavior';


    protected static ?string $description = "discover patient heart behavior";

    protected static bool $isLazy = false;


    protected function getData(): array
    {
        return [
            'labels' => ['danger', 'moderate', 'normal'],
            'datasets' => [
                [
                    'label' => 'dataset',
                    'data' => [20, 25, 55],
                    'backgroundColor' => ['red', 'orange', 'dodgerblue'],
                ]
            ]
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
