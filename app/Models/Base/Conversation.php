<?php

namespace App\Models\Base;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\DB;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_conversationable_type',
        'source_conversationable_id',
        'target_conversationable_type',
        'target_conversationable_id',
        'content',
        'image',
        'type'
    ];

    protected $casts = [
        'starts_at' => 'datetime'
    ];
    public function chats(): HasMany
    {
        return $this->hasMany(Chat::class);
    }

    public function receiver(): MorphTo
    {
        return$this->morphTo('target_conversationable');
    }

    public function sender(): MorphTo
    {
        return$this->morphTo('source_conversationable');
    }

    public function getOtherParticipant(Authenticatable $user){
        if(
            $this->target_conversationable_id == $user->id &&
            $this->target_conversationable_type == get_class($user)
        ){
            return $this->source_conversationable_type::find($this->source_conversationable_id);
        }else{
            return $this->target_conversationable_type::find($this->target_conversationable_id);
        }
    }

    public function giveSender(Authenticatable $obj)
    {
        return$this->morphToMany(
            get_class($obj),
            'source_conversationable',
            $this->table,
            'id',
            'source_conversationable_id'
        );
    }


}
