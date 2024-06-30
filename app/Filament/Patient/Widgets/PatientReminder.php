<?php

namespace App\Filament\Patient\Widgets;

use Filament\Facades\Filament;
use Filament\Widgets\Widget;

class PatientReminder extends Widget
{
    protected static bool $isLazy = false;
    protected static string $view = 'filament.patient.widgets.patient-reminder';
    protected int | string | array $columnSpan = 2 ;


    protected function getViewData(): array
    {
        return [
            'user' => Filament::auth()->user()
        ];
    }

}
