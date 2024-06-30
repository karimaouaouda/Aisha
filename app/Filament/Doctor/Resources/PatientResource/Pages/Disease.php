<?php

namespace App\Filament\Doctor\Resources\PatientResource\Pages;

use App\Filament\Doctor\Resources\PatientResource;
use App\Models\Auth\Patient;
use Filament\Resources\Pages\Page;

class Disease extends Page
{
    protected static string $resource = PatientResource::class;

    protected static string $view = 'filament.doctor.patients.analytics.disease.details';

    public Patient $patient;

    public string $disease;

    public function mount(Patient $record, string $disease){
        $this->patient = $record;

        $this->disease = $this->heading =  $disease;
    }


    protected function getViewData(): array
    {
        $analytics = $this->patient->postAnalysis()->get(['source_text', 'diseases_expected', 'created_at']);

        $analytics = $analytics->map(function($analyse){
           $analyse->source_text = json_decode(json_decode($analyse->source_text, true), true);
           $analyse->diseases_expected = json_decode(json_decode($analyse->diseases_expected, true), true) ;

           return $analyse;
        });

        $data = $analytics->filter(function($analyse){
            $isInGemini = $isInUser =  false;

            foreach($analyse->diseases_expected as $from => $data){
                foreach ($data as $disease => $score){
                    if($disease == $this->disease && $score > 0.35){
                        $analyse->disease = $score;
                        return true;
                    }
                }
            }

            return false;
        });
        return [
            'disease' => $this->disease,
            'patient' => $this->patient,
            'data' => $data

        ];
    }
}
