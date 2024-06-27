<?php

namespace App\Filament\Shared\Pages;

use Cheesegrits\FilamentGoogleMaps\Fields\Geocomplete;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;
use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
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
                        Hidden::make('addressable_type')
                            ->default(get_class(Filament::auth()->user()))
                            ->required(),
                        Hidden::make('addressable_id')
                            ->default(Filament::auth()->id())
                            ->required(),

                        Geocomplete::make('geocomplete')
                            ->reactive()
                            ->hint('and the location and see the map')
                            ->label('search for a location'),
                        Map::make('location')
                            ->label('location')
                            ->default(function(){
                                return Filament::auth()->user()->address->location['lat'];
                            })
                            ->geolocate()
                            ->geolocateOnLoad()
                            ->clickable()
                            ->autocomplete('geocomplete')
                            ->lazy()
                            ->reactive(),
                    ])
                    ->statePath('data')
                    ->model(Filament::auth()->user()->address);
    }

    public function create()
    {
        $address = Filament::auth()->user()->address;

        $data = $this->address->getState();

        $address->lat = $data['location']['lat'];

        $address->long = $data['location']['lng'];

        $address->save();

        Notification::make()
            ->title('address saved')
            ->success()
            ->send();
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
