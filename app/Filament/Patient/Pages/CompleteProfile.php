<?php

namespace App\Filament\Patient\Pages;

use Filament\Facades\Filament;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Config;

class CompleteProfile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public array $bodyFormData;

    public array $healthFormData;

    protected static string $view = 'filament.patient.pages.complete-profile';

    public function mount(){
        $this->bodyData->fill();
        $this->healthData->fill();
    }
    public function getForms(): array
    {
        return [
            'bodyData',
            'healthData',
        ];
    }

    public function bodyData(Form $form): Form
    {
        return $form->schema([
            Repeater::make('body_data')
                ->schema([
                    Select::make('name')
                        ->options(Config::get('app.body_data'))
                        ->hint('add the data you will enter')
                        ->required(),
                    TextInput::make('value')
                        ->placeholder('the value')
                        ->required()
                ])->maxItems(count(Config::get('app.body_data')))
        ])->statePath('bodyFormData');
    }

    public function healthData(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('health_data')
                    ->schema([
                        Select::make('name')
                            ->options(Config::get('app.health_data'))
                            ->hint('add the data you will enter')
                            ->required(),
                        TextInput::make('value')
                            ->placeholder('the value')
                            ->required()
                    ])->maxItems(count(Config::get('app.health_data')))
            ])
            ->statePath('healthFormData');
    }

    public function updateBodyData(): void
    {
        $data = $this->bodyData->getState();
        $dataToStore = [];
        foreach ($data['body_data'] as $info){
            $dataToStore[$info['name']] = $info['value'];
        }

        $user = Filament::auth()->user();

        $user->body_data = json_encode($dataToStore);

        $user->save();

        $this->bodyData->fill();

        Notification::make()
            ->title('uploaded successfully')
            ->success()
            ->send();
    }

    public function updateHealthData(): void
    {
        $data = $this->bodyData->getState();
        $dataToStore = [
            'diseases' => [],
            'symptoms' => []
        ];

        foreach ($data['health_data'] as $info){
            if($info['name'] == 'disease'){
                $dataToStore['diseases'][] = $info['value'];
            }else{
                $dataToStore['symptoms'][] = $info['value'];
            }
        }

        $user = Filament::auth()->user();

        $user->health_data = json_encode($dataToStore);

        $user->save();

        $this->healthData->fill();

        Notification::make()
            ->title('uploaded successfully')
            ->success()
            ->send();
    }
}
