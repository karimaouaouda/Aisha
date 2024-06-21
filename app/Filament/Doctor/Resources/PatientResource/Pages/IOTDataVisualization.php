<?php

namespace App\Filament\Doctor\Resources\PatientResource\Pages;

use App\Enums\IOTTopics;
use App\Filament\Doctor\Resources\PatientResource;
use App\Models\Auth\Patient;
use Filament\Resources\Pages\Page;

class IOTDataVisualization extends Page
{
    protected static string $resource = PatientResource::class;

    protected static string $view = 'filament.doctor.resources.patient-resource.pages.i-o-t-data-visualization';
    //protected static ?string $slug = 'finance/{id}';

    protected static ?string $slug = '/{record}/states/iot';
    protected static bool $shouldRegisterNavigation = false;

    public Patient $record; # Assuming Finance is a model.

    public function mount($record): void
    {
        $this->record = $record;
    }

    protected function getViewData(): array
    {
        $data = $this->record->iot_data()->where('topic', IOTTopics::HEART_BEATS->value)->get(["data", "created_at"]);


        $data = $data->map(function($d){
            $json_data = json_decode($d->data, true);
            $d->heart_beats = $json_data['heart beats'];
            return $d;
        });


        return [
            'heart_analytics' => $data->isEmpty() ? [] : analyseHeartBeats($data->toArray(), 30),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
//            HeartBeatWidget::make([
//                'patient' => $this->record
//            ]),
        ];
    }

    public static function getRoutePath(): string
    {
        return self::$slug;
    }
}
