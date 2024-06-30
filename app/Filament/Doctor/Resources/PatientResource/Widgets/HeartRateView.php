<?php

namespace App\Filament\Doctor\Resources\PatientResource\Widgets;

use App\Enums\IOTTopics;
use App\Models\Auth\Patient;
use Filament\Facades\Filament;
use Filament\Support\Colors\Color;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class HeartRateView extends ChartWidget
{
    protected static ?string $heading = 'Heart Behavior';


    protected static ?string $description = "discover patient heart behavior";

    public Patient $patient;

    protected static bool $isLazy = false;


    protected function getData(): array
    {

        $data = $this->patient
                        ->iot_data()
                        ->where('topic', IOTTopics::HEART_BEATS->value)
                        ->get('data')
                        ->pluck('data');
        $data = $data->map(function($d){
            return json_decode($d, true);
        });
        $zones = [0, 0, 0];

        foreach ($data as $key => $info){
            $score = array_values($info)[0];
            if( $score < 15 || $score > 150 ){
                $zones[0] += 1;
                continue;
            }

            if($score > 120){
                $zones[1] += 1;
                continue;
            }

            $zones[2] += 1;
        }
        return [
            'labels' => ['danger', 'moderate', 'normal'],
            'datasets' => [
                [
                    'label' => 'dataset',
                    'data' => $zones,
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
