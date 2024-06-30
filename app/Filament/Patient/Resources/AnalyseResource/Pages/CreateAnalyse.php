<?php

namespace App\Filament\Patient\Resources\AnalyseResource\Pages;

use App\Filament\Client\Resources\AnalyseResource;
use App\Models\UserData;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateAnalyse extends CreateRecord
{
    protected static string $resource = AnalyseResource::class;

    protected ?string $heading = "upload new data";

    protected static bool $canCreateAnother = false;

    protected ?string $subheading = 'these data must be a real data from analyses';

    public function create(bool $another = false): void
    {
        $this->authorizeAccess();

        $patient_id = $this->form->getState()['patient_id'];

        $data = $this->form->getState()['values'];

        foreach ($data as $info){
            $info['patient_id'] = $patient_id;
            $user_data = new UserData($info);
            $user_data->save();
        }

        Notification::make()
            ->title('created successfully')
            ->success()
            ->send();

        $this->form->fill();
        //$this->redirect(route('filament.patient.resources.analyses.create'));
    }
}
