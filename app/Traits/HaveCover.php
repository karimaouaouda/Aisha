<?php

namespace App\Traits;

trait HaveCover
{
    public function getCoverUrlAttribute(){
        if( file_exists(storage_path('/app/public/data/doctors/doctor_' . $this->id . '/covers/' . $this->cover)) ){
            return asset($this->cover);
        }

        return asset('./images/default_cover.jfif');
    }
}
