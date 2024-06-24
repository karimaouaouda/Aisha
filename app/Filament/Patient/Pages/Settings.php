<?php

namespace App\Filament\Patient\Pages;

use Filament\Pages\Page;
use Filament\Pages\SubNavigationPosition;

class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::End;

    protected static ?int $navigationSort = 100;

    protected static string $view = 'filament.patient.pages.settings';
}
