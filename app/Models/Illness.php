<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Illness extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
    ];


    public function malades(){
        return $this->belongsToMany(User::class, "user_illnesses");
    }

    public function analysis(){
        return $this->belongsToMany(Analyse::class, "illness_analysis");
    }


    public function iotdevices(){
        return $this->belongsToMany(IOTDevice::class, "illnesses_devices");
    }
}
