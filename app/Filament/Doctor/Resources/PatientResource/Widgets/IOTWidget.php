<?php

namespace App\Filament\Doctor\Resources\PatientResource\Widgets;

use App\Filament\Doctor\Resources\PatientResource;
use Filament\Widgets\Widget;

class IOTWidget extends Widget
{
    protected static string $view = 'filament.doctor.resources.patient-resource.widgets.i-o-t-widget';

    public $patient_id;
    public static function getDefaultProperties(): array
    {
        return ['karim'];
    }

    protected function getViewData(): array
    {
        return [
            'url' => '/doctor/workspace/patients/' . $this->patient_id . '/states/iot'
        ];
    }
}
