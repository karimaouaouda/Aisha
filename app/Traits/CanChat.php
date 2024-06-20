<?php

namespace App\Traits;

use App\Models\Base\Chat;
use App\Models\Base\Conversation;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait CanChat
{
    public function src_conversations(): MorphMany
    {
        return $this->morphMany(Conversation::class, 'source_conversationable');
    }

    public function target_conversations(): MorphMany
    {
        return $this->morphMany(Conversation::class, 'target_conversationable');
    }


    public function hasConversationWith(Authenticatable $user){
        $isSrc =  ($this->src_conversations()
                    ->where('target_conversationable_type', get_class($user))
                    ->where('target_conversationable_id', $user->id)
                    ->get());

        if( !$isSrc->isEmpty() ){
            return $isSrc->first()->id;
        }

        $isTarget = ($this->target_conversations()
                    ->where('source_conversationable_type', get_class($user))
                    ->where('source_conversationable_id', $user->id)
                    ->get());

        if( !$isTarget->isEmpty() ){
            return $isTarget->first()->id;
        }

        return false;
    }
}
