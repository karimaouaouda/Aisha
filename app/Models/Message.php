<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;


    protected $fillable = [
        "patient_id",
        "content",
        "filling",
        'audio_path',
        "gpt_response"
    ];



    public function user(){
        return $this->belongsTo(User::class);
    }
}
