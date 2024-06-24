<?php

namespace App\Models;

use App\Models\Auth\Doctor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'title',
        'sub_title',
        'summarize',
        'body',
        'cover',
        'paid',
        'price',
        'references'
    ];


    protected $casts = [
        'references' => 'array'
    ];

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

}
