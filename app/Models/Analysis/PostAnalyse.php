<?php

namespace App\Models\Analysis;

use App\Models\Auth\Patient;
use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostAnalyse extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'source_text',
        'start_from_message',
        'stop_at_message',
        'diseases_expected',
    ];


    protected $casts = [
        'diseases_expected' => 'array',
        'source_text' => 'array'
    ];



    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function startMessage(): BelongsTo
    {
        return $this->belongsTo(Message::class, 'start_from_message');
    }

    public function stopMessage(): BelongsTo
    {
        return $this->belongsTo(Message::class, 'stop_at_message');
    }
}
