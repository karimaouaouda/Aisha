<?php

namespace App\Actions\Filament\Auth\Patient;

use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Placeholder;
use Filament\Pages\Auth\Login as FilamentLogin;
use Filament\Support\Colors\Color;

class Login extends FilamentLogin
{


    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getRememberFormComponent(),
                        Placeholder::make('separator')
                            ->label('or use social accounts :'),

                        Actions::make([
                            Action::make('fb')
                                ->color(Color::Blue)
                                ->label('continue with facebook')
                                ->action(function (){
                                    $this->redirect('https://chatpy.test/auth/redirect/fb', false);
                                } )
                        ])->fullWidth(),
                        Actions::make([
                            Action::make('google')
                                ->color(Color::Sky)
                                ->label('continue with google')
                                ->action(function (){
                                    $this->redirect('https://chatpy.test/auth/redirect/google', false);
                                } )
                        ])->fullWidth(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

}
