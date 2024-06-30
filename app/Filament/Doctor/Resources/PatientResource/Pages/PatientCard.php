<?php

namespace App\Filament\Doctor\Resources\PatientResource\Pages;

use App\Filament\Doctor\Resources\PatientResource;
use App\Models\Auth\Patient;
use Filament\Resources\Pages\Page;

class PatientCard extends Page
{
    protected static string $resource = PatientResource::class;

    protected static string $view = 'filament.doctor.patients.patient-card';

    public Patient $patient;

    public function mount(Patient $record) : void
    {
        $this->patient = $record;
    }


    protected function getViewData(): array
    {
        return [
            'user' => $this->patient
        ];
    }

}
