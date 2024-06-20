<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'conversation_id',
        'source_conversationable_type',
        'source_conversationable_id',
        'target_conversationable_type',
        'target_conversationable_id',
        'type',
        'content',
        'image',
    ];


    public function sender(){
        return $this->source_conversationable_type::find($this->source_conversationable_id);
    }

    public function receiver(){
        return $this->target_conversationable_type::find($this->target_conversationable_id);
    }

}
