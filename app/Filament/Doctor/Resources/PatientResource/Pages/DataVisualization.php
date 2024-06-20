<?php

namespace App\Filament\Doctor\Resources\PAtientResource\Pages;

use App\Filament\Doctor\Resources\PatientResource;
use Filament\Resources\Pages\Page;

class DataVisualization extends Page
{
    protected static string $resource = PatientResource::class;

    protected static string $view = 'filament.doctor.resources.patient-resource.pages.data-visualization';

    public static function getRoutePath(): string
    {
        return '/doctor/workspace/patients/{record}/states/iot';
    }
}
