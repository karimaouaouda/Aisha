<?php

namespace App\Filament\Patient\Pages;

use Cheesegrits\FilamentGoogleMaps\Fields\Geocomplete;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;
use Filament\Actions\Concerns\HasForm;
use Filament\Forms\Commands\Concerns\CanGenerateForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\Page;
use Filament\Pages\SubNavigationPosition;
class Settings extends Page implements HasForms
{

    use InteractsWithForms;

    public ?array $data = [];

    public ?array $otherData = [];

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected ?string $heading = "account settings";
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::End;

    protected static ?int $navigationSort = 100;

    protected static string $view = 'filament.patient.pages.settings';


    public function mount(): void
    {
        $this->address->fill();

        $this->other->fill();
    }


    protected function getForms(): array
    {
        return [
            'address',
            'other'
        ];
    }


    public function address(Form $form): Form
    {
        return $form
                    ->schema([
                        Geocomplete::make('geocomplete')
                            ->reactive()
                            ->label('location chosen'),
                        Map::make('location')
                            ->label('location')
                            ->mapControls([
                                'mapTypeControl'    => true,
                                'scaleControl'      => true,
                                'streetViewControl' => true,
                                'rotateControl'     => true,
                                'fullscreenControl' => true,
                                'searchBoxControl'  => true, // creates geocomplete field inside map
                                'zoomControl'       => false,
                            ])
                            ->geolocate()
                            ->geolocateOnLoad()
                            ->clickable()
                            ->autocomplete('geocomplete')
                            ->lazy()
                            ->afterStateUpdated(function($state){
                                dd($state);
                            })
                            ->reactive(),
                    ])
                    ->statePath('data');
    }

    public function other(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('id')
            ])
            ->statePath('otherData');
    }
}
