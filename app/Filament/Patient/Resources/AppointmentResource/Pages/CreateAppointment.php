<?php

namespace App\Filament\Patient\Resources\AppointmentResource\Pages;

use App\Filament\Patient\Resources\AppointmentResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateAppointment extends CreateRecord
{
    protected static string $resource = AppointmentResource::class;

    protected ?string $heading = 'Ask For Appointment with doctor';

    protected static bool $canCreateAnother = false;


    protected function getCreateFormAction(): Action
    {
        return Action::make('ask')
            ->label('request appointment')
            //->label(__('filament-panels::resources/pages/create-record.form.actions.create.label'))
            ->submit('create')
            ->keyBindings(['mod+s']);
    }

}
