<?php

namespace App\Filament\Doctor\Widgets;

use Filament\Facades\Filament;
use Filament\Support\Colors\Color;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class GlobeStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            'patients' => $this->patientsStat(),
            'opinions' => $this->opinionsStat(),
            'followers' => $this->followersStat()
        ];
    }

    private function patientsStat() : Stat
    {
        return Stat::make('patient followed by you', Filament::auth()->user()->patients()->count() )
                        ->chart([0, 1])
                        ->color(Color::Green)
                        ->icon('heroicon-o-user-group')
                        ->description('more people you follow more we award you')
                        ->descriptionIcon('heroicon-o-check-badge')
                        ->descriptionColor(Color::Sky)
                        ->chartColor(Color::Sky);
    }

    private function opinionsStat() : Stat
    {
        return Stat::make('people rate you', 12 )
            ->chart([4, 5, 2, 3, 1])
            ->color(Color::Sky)
            ->icon('heroicon-o-sparkles')
            ->description('more stars you get more appearance')
            ->descriptionIcon('heroicon-o-star')
            ->descriptionColor(Color::Sky)
            ->chartColor(Color::Green);
    }

    private function followersStat() : Stat
    {
        return Stat::make('patient followe you', +215 )
            ->chart([100, 150, 100, 90, 85, 105, 200,  215])
            ->color(Color::Sky)
            ->icon('heroicon-o-presentation-chart-line')
            ->description('share more articles and posts make people follow you')
            ->descriptionIcon('heroicon-o-arrow-trending-up')
            ->descriptionColor(Color::Green)
            ->chartColor(Color::Red);
    }
}
