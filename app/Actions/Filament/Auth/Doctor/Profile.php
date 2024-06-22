<?php

namespace App\Actions\Filament\Auth\Doctor;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile;
use Filament\Pages\Page;

class Profile extends Page {

    use InteractsWithForms;

    protected static string $view = 'profile.show';
}
