<?php

namespace App\Filament\Patient\Pages;

use Filament\Pages\Page;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected ?string $heading = "Welcome back ! ";

    public function mount(): void
    {
        $this->heading = 'Welcome back, ' . auth('patient')->user()->name ;
    }
}
