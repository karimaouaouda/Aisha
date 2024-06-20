<?php

namespace App\Filament\Doctor\Resources\PatientResource\Pages;

use App\Enums\RequestStatus;
use App\Filament\Doctor\Resources\PatientResource;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\DB;

class MedicalRequests extends Page
{
    protected static string $resource = PatientResource::class;

    protected static string $view = 'filament.doctor.resources.patient-resource.pages.medical-requests';



    protected function getViewData(): array
    {
        $query = DB::table('medical_following_requests as mfr')
                        ->join('patients as p', 'mfr.patient_id', '=', 'p.id')
                        ->where('mfr.doctor_id', '=', auth('doctor')->id())
                        ->where('mfr.status', '=', RequestStatus::WAITING->value);

        return [
            'doctor' => auth('doctor')->user(),

            'requests' => $query->get()
        ];
    }
}
