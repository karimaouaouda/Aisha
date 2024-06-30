<?php

namespace App\Models\Base;

use App\Models\Auth\Doctor;
use App\Models\Auth\Patient;
use App\Models\Medicine;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Treatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'patient_id',
    ];



    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function medicines(): BelongsToMany
    {
        return $this->belongsToMany(Medicine::class, 'medicine_assignements');
    }
}
