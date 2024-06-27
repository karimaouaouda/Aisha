<?php

namespace App\Observers;

use App\Interfaces\MustHaveAddress as Addressable;
use App\Models\Base\Address;
use Illuminate\Support\Facades\DB;

class SharedOberver
{
    /**
     * Handle the Addressable "created" event.
     */
    public function created(Addressable $user): void
    {
        $address = new Address([
            'addressable_type' => get_class($user),
            'addressable_id' => $user->id,
            'lat' => null,
            'long' => null,
            'location_name' => null
        ]);

        $address->save();
    }

    /**
     * Handle the Addressable "updated" event.
     */
    public function updated(Addressable $doctor): void
    {
        //
    }

    /**
     * Handle the Addressable "deleted" event.
     */
    public function deleted(Addressable $doctor): void
    {
        //
    }

    /**
     * Handle the Addressable "restored" event.
     */
    public function restored(Addressable $doctor): void
    {
        //
    }

    /**
     * Handle the Addressable "force deleted" event.
     */
    public function forceDeleted(Addressable $doctor): void
    {
        //
    }
}
