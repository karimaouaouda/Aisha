<?php

namespace App\Models;

use App\Models\Auth\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;



    protected $fillable = [
        'name',
        'count',
        'method',
        'quantity'
    ];


    public function doctors(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        request();
        return $this->belongsToMany(
            Patient::class,
            "medicine_assignements",
            'medicine',
            'doctor_id');
    }

    public function patients(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            "medicine_assignements",
            'medicine_id',
            'patient_id');
    }

}
