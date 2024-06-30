<?php

namespace App\Models;

use App\Models\Auth\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserData extends Model
{
    use HasFactory;


    protected $fillable = [
        'patient_id',
        'topic',
        'data'
    ];



    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
