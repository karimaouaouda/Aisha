<?php

namespace App\Filament\Doctor\Pages;

use Filament\Pages\Page;

class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.doctor.pages.settings';


    protected function getViewData(): array
    {
        $doc = auth('doctor')->user();

        return [
            'user' => $doc
        ];
    }
}
