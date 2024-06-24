<?php

namespace App\Filament\Patient\Widgets;

use Filament\Facades\Filament;
use Filament\Widgets\Widget;

class DoctorNote extends Widget
{
    protected static string $view = 'filament.patient.widgets.doctor-note';

    protected static bool $isLazy = false;
    protected int | string | array $columnSpan = 2;


    protected function getViewData(): array
    {
        return [
            'patient' => Filament::auth()->user(),
        ];
    }
}
