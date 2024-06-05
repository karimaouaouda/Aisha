<?php

namespace App\Actions\Filament\Auth\Doctor;

use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Pages\Auth\Register as FilamentRegister;
use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\Config;

class Register extends FilamentRegister
{


    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        Wizard::make([
                            Wizard\Step::make('personal information')
                                ->schema([
                                    $this->getNameFormComponent(),

                                    TextInput::make('fix_number')
                                        ->type("number")
                                        ->regex('/^0[1-9]\d{7}$/')
                                        ->required(),

                                    Select::make('speciality')
                                        ->options(Config::get('doctor.specialities_options'))
                                        ->required(),
                                ]),

                            Wizard\Step::make('login information')
                                ->schema([
                                    $this->getEmailFormComponent(),
                                    $this->getPasswordFormComponent(),
                                    $this->getPasswordConfirmationFormComponent(),
                                ])
                        ])
                    ])
                    ->statePath('data'),
            ),
        ];
    }

}

/**
 * TODO 1 - fix social registration
 * TODO 2 - add shippment fields and tags to product creation
 * TODO 3 - fix social registration
*/
