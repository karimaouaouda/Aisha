<?php

namespace App\Models;

use App\Models\Auth\Patient;
use App\Models\Base\Treatment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Medicine extends Model
{
    use HasFactory;



    protected $fillable = [
        'name',
        'count',
        'method',
        'quantity'
    ];

    public function treatments(): BelongsToMany
    {
        return $this->belongsToMany(Treatment::class, 'medicine_assignements');
    }

}
