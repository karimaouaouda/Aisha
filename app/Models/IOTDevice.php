<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IOTDevice extends Model
{
    use HasFactory;


    protected $fillable = [
        "name",
        "short_desc",
        "description",
    ];

    public function illnesses(){
        return $this->belongsToMany(Illness::class, "illnesses_devices");
    }
}
