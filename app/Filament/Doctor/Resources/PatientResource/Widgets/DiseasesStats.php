<?php

namespace App\Filament\Doctor\Resources\PatientResource\Widgets;

use Filament\Widgets\Widget;

class DiseasesStats extends Widget
{
    protected static bool $isLazy = false;
    protected static string $view = 'filament.doctor.patients.parts.post-analytics.diseases';
}