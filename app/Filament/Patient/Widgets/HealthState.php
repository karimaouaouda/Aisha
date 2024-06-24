<?php

namespace App\Filament\Patient\Widgets;

use App\Enums\IOTTopics;
use App\Filament\Patient\Resources\DoctorResource\Pages\ListDoctors;
use App\Models\Auth\Patient;
use Filament\Facades\Filament;
use Filament\Support\Colors\Color;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class HealthState extends BaseWidget
{
    protected function getStats(): array
    {
        $patient = Filament::auth()->user();

        $docs = $patient->doctors()->count();

        $docState = $this->buildDocsStat($docs);
        return [
            'docs' => $docState,
            'beats' => $this->buildHeartBeatsStat($patient),
            'messages' => $this->buildMessageStat($patient),
        ];
    }

    private function buildMessageStat(Patient $patient): Stat
    {

        $count = $patient->messages()->count();

        return Stat::make('GPTs messages', $count)
                        ->icon('icon-robot')
                        ->description('by talking to MedGpt you help doctors to better uderstand your healt situation')
                        ->descriptionColor(Color::Green)
                        ->chart([0, 125]);
    }

    private function buildHeartBeatsStat(Patient $patient) : Stat
    {
        $heart_beats = $patient->iot_data()
                                    ->where('topic', IOTTopics::HEART_BEATS->value)
                                    ->get();

        if($heart_beats->isEmpty()){
            return Stat::make('heart beats', 0)
                            ->icon('icon-heart-pulse')
                            ->description('you have no device for couting heart beats, buy now')
                            ->descriptionIcon('heroicon-o-arrow-top-right-on-square')
                            ->descriptionColor(Color::Red)
                            ->chart([0, 0])
                            ->chartColor(Color::Sky);
        }else{
            $sum = 0;
            $values = [];
            $heart_beats->map(function($beat) use(&$sum, &$values){
                $data = $beat->data;
                $data = json_decode($data, true);
                $beats = $data['heart beats'];
                $values[] = $beats;
                $sum += $beats;
            });
            return Stat::make('heart beats', $sum)
                            ->icon('icon-heart-pulse')
                            ->description('every heart beat remind you that the life is too short, so live it healthy')
                            ->descriptionColor(Color::Red)
                            ->chart($values)
                            ->chartColor(Color::Sky);
        }
    }
    private function buildDocsStat(int $docs): Stat
    {
        if( ! $docs ){
            return Stat::make("you don't follow any doctor", 0)
                        ->description('feel free to contact doctors and follow them')
                        ->icon('heroicon-o-exclamation-circle')
                        ->descriptionIcon('heroicon-o-user-group')
                        ->color(Color::Blue)
                        ->url(url('/doctors'));
        }

        return Stat::make("you are followed at", $docs)
                        ->description('click in this widget to see in table')
                        ->descriptionIcon('heroicon-o-arrow-top-right-on-square')
                        ->icon('heroicon-o-user-group')
                        ->color(Color::Green)
                        ->openUrlInNewTab()
                        ->chart([15, 21 , 11, 2])
                        ->url(ListDoctors::getUrl());
    }
}
