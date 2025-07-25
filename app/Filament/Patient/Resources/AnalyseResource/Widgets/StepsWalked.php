<?php

namespace App\Filament\Patient\Resources\AnalyseResource\Widgets;

use Filament\Widgets\ChartWidget;

class StepsWalked extends ChartWidget
{
    protected static ?string $heading = 'Walk with the data';


    protected function getData(): array
    {

        $data = [
            "labels" => [
              'Eating',
              'Drinking',
              'Sleeping',
              'Designing',
              'Coding',
              'Cycling',
              'Running'
            ],
            "datasets"=> [[
              "label" => 'My First Dataset',
              "data" => [65, 59, 90, 81, 56, 55, 40],
              "fill" => true,
              "backgroundColor" => 'rgba(255, 99, 132, 0.2)',
              "borderColor" => 'rgb(255, 99, 132)',
              "pointBackgroundColor" => 'rgb(255, 99, 132)',
              "pointBorderColor" => '#fff',
              "pointHoverBackgroundColor" => '#fff',
              "pointHoverBorderColor" => 'rgb(255, 99, 132)'
            ], [
              "label" => 'My Second Dataset',
              "data" => [28, 48, 40, 19, 96, 27, 100],
              "fill" => true,
              "backgroundColor" => 'rgba(54, 162, 235, 0.2)',
              "borderColor" => 'rgb(54, 162, 235)',
              "pointBackgroundColor" => 'rgb(54, 162, 235)',
              "pointBorderColor" => '#fff',
              "pointHoverBackgroundColor" => '#fff',
              "pointHoverBorderColor" => 'rgb(54, 162, 235)'
            ]]
        ];
        return $data;
    }

    protected function getType(): string
    {
        return 'radar';
    }
}
