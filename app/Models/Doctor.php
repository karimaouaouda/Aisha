<?php

namespace App\Models;

use App\Traits\AuthModel;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use AuthModel;
    use HasFactory;

    protected $fillable = [
        "user_id",
        "speciality",
    ];


    public function appointments(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Patient::class, "appointments");
    }

    public function medicineAssignements(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Medicine::class, "medicine_assignements");
    }
}
