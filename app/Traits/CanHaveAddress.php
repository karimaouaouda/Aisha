<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphOne;


/**
 * @mixin User
*/
trait CanHaveAddress
{
    public function address(): MorphOne
    {
        return $this->morphOne(\App\Models\Base\Address::class, 'addressable');
    }
}
