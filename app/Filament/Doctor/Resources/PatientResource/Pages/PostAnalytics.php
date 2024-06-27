<?php

namespace App\Filament\Doctor\Resources\PatientResource\Pages;

use App\Models\Auth\Doctor;
use App\Models\Auth\Patient;
use Filament\Facades\Filament;
use App\Filament\Doctor\Resources\PatientResource;
use Filament\Resources\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PostAnalytics extends Page
{
    protected static string $resource = PatientResource::class;

    protected static string $view = 'filament.doctor.patients.analytics';

    public Doctor $doctor;

    public Patient $record;

    protected  ?string $heading = "Post Analytics";

    protected ?string $subheading = 'discover the power of ai';

    protected function getHeaderWidgets(): array
    {
        return [
            PatientResource\Widgets\DiseasesStats::make(),
            PatientResource\Widgets\HeartRateView::make(),
        ];
    }


    public function mount(Patient $record): void
    {
        $this->record = $record;

        $this->doctor = Filament::auth()->user();
    }




}
