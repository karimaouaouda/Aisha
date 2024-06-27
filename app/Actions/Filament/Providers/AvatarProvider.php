<?php

namespace App\Actions\Filament\Providers;

use Filament\AvatarProviders\UiAvatarsProvider;
use Filament\Facades\Filament;
use Filament\Support\Facades\FilamentColor;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Color\Rgb;

class AvatarProvider extends UiAvatarsProvider
{

    public function get(Model | Authenticatable $record): string
    {
        return $record->profile_photo_url;
    }
}
