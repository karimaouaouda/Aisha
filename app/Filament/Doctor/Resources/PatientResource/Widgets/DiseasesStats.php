<?php

namespace App\Filament\Doctor\Resources\PatientResource\Widgets;

use App\Models\Auth\Patient;
use Filament\Widgets\Widget;

class DiseasesStats extends Widget
{
    protected static bool $isLazy = false;
    protected static string $view = 'filament.doctor.patients.parts.post-analytics.diseases';
    public Patient $patient;


    protected function getViewData(): array
    {
        return [
            'patient' => $this->patient,
            'diseases' => $this->patient->possibleDiseases(),
        ];
    }
}
