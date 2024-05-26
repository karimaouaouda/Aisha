<?php

namespace App\Models;

use App\Traits\AuthModel;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use AuthModel;
    use HasFactory;

    protected $fillable = [
        "user_id",
    ];



    public  function appointments(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Doctor::class, "appointments");
    }

    public function medicineAssignements(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Medicine::class, "medicine_assignements");
    }
}
