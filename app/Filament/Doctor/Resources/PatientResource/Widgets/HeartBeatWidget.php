<?php

namespace App\Filament\Doctor\Resources\PatientResource\Widgets;

use App\Enums\IOTTopics;
use App\Models\Auth\Patient;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Forms\Components\DatePicker;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class HeartBeatWidget extends ApexChartWidget
{
    protected static ?string $heading = 'Heart Beats';

    protected int | string | array $columnSpan = 2;

    protected static bool $isLazy = false;

    public ?Patient $patient = null;

    protected static ?string $pollingInterval = '60s';

    protected function getFormSchema(): array
    {
        return [
            DatePicker::make('date_start')
                ->default(now()->subMonth()),
            DatePicker::make('date_end')
                ->default(now()),
        ];
    }

    protected function getOptions(): array
    {
        $data = $this->patient->iot_data()
                    ->where('topic', '=', IOTTopics::HEART_BEATS->value)
                    ->whereBetween('created_at', [
                        Carbon::parse($this->filterFormData['date_start']),
                        Carbon::parse($this->filterFormData['date_end'])
                    ])
                    ->get();

        $labels = $data->map(function($m){
            return $m->created_at->format('d/m h:i');
        });

        $data = $data->pluck('data');

        $data = $data->map(function($d){
            return json_decode($d, true)['heart beats'];
        });

        $data = $data->toArray();


        return [
            'chart' => [
                'type' => 'line',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'heart beat',
                    'data' => $data,
                ],
            ],
            'xaxis' => [
                'categories' => $labels,
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 200,
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 200,
                    ],
                ],
            ],
            'colors' => ['#6366f1'],
            'stroke' => [
                'curve' => 'smooth',
            ],
        ];
    }


//    protected function getData(): array
//    {
//        $data = $this->patient->iot_data()->whereBetween('created_at', [
//            now()->addDays(-2),
//            now()
//        ])->get();
//
//        $data = $data->filter(function($d){
//            return $d->topic == IOTTopics::HEART_BEATS->value;
//        });
//        $l = [];
//        $labels = $data->map(function($d) use(&$l){
//            $l[] = $d->created_at->format('d-m-y h:m');
//            return $d->created_at;
//        });
//
//        $v = [];
//        $values = $data->map(function($d) use(&$v){
//            $v[] = json_decode($d->data, true)['heart beats'];
//            return json_decode($d->data, true)['heart beats'];
//        });
//
//        $labels1 =  ['jan', 'fev', 'mar', 'avr', 'jun', 'jui'];
//
//        //$labels2 = ['aou', 'sep'];
//
//        return [
//            'labels' =>$l,
//            'datasets' => [
//                [
//                    'label' =>'heart beat',
//                    'data' => $v,
//                    'fill' => false,
//                    'borderColor' => 'rgb(75, 192, 192)',
//                    'tension' => 0.1
//                ]
//            ],
//        ];
//    }

    protected function loadData(){
        $data = $this->patient->iot_data;
        $period =  CarbonPeriod::create($data->first()->created_at, $data->last()->created_at);

        return $period->toArray();
    }


    protected function getType(): string
    {
        return 'bar';
    }
}
