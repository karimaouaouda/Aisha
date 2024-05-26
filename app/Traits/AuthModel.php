<?php

namespace App\Traits;

use App\Models\User;
use Filament\Panel;

trait AuthModel
{
    public function user(){
        return $this->belongsTo(User::class);
    }

//    public function getAuthInfoAttribute(): void
//    {
//        retrun null;
//    }
}
