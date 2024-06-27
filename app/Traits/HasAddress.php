<?php

namespace App\Traits;

use App\Models\Base\Address;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasAddress
{
    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
