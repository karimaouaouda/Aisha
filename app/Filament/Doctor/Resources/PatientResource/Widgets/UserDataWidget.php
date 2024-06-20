<?php

namespace App\Filament\Doctor\Resources\PatientResource\Widgets;

use App\Filament\Doctor\Resources\PatientResource;
use Filament\Widgets\Widget;

class UserDataWidget extends Widget
{
    protected static string $view = 'filament.doctor.resources.patient-resource.widgets.user-data-widget';

    public $patient_id;

    protected function getViewData(): array
    {
        return [
            'url' => '/doctor/workspace/patients/' . $this->patient_id . '/states/user-data'
        ];
    }
}
