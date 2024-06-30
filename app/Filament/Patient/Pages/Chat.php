<?php

namespace App\Filament\Patient\Pages;

use App\Filament\Client\Resources\ChatResource;
use App\Filament\Patient\Widgets\PatientReminder;
use Filament\Facades\Filament;
use Filament\Resources\Pages\Page;

class Chat extends \Filament\Pages\Dashboard
{

    public static function getRoutePath(): string
    {
        return '/med-gpt';
    }

    protected static ?string $navigationLabel = "MedGpt";

    protected static ?string $navigationIcon = 'icon-robot';

    public function mount(): void
    {
        $this->heading = 'Welcome back, ' . auth('patient')->user()->name ;
    }

    protected function getHeaderWidgets(): array
    {

        if( !Filament::auth()->user()->completeProfile() ){
            return [
                PatientReminder::make()
            ];
        }

        return [];
    }

    protected function getViewData(): array
    {
        return [
            'messages' => auth()->user()->messages
        ];
    }

    protected static string $view = 'filament.patient.resources.chat-resource.pages.chat';
}
