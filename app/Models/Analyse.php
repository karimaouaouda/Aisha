<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
    ];


    public function illnesses(){
        return $this->belongsToMany(Illness::class, "illness_analysis");
    }
}
