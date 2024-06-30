<?php

namespace App\Traits;

use App\Models\Base\Conversation;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;

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

    public function conversations(string|int $except = null): Collection
    {
        $q = Conversation::with(['sender', 'receiver'])
            ->where(function(Builder $query){
                return $query->where('source_conversationable_type', get_class($this))
                    ->where('source_conversationable_id', $this->id);
            })
            ->orWhere(function(Builder $query){
                return $query->where('target_conversationable_type', get_class($this))
                    ->where('target_conversationable_id', $this->id);
            });

        if($except !== null){
            $q->where('id', '!=', $except);
        }

        return $q->get();
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

    public function isSender(Conversation $conv): bool
    {
        return ( $conv->source_convesationable_type == get_class($this) ) &&
               ($conv->source_convesationable_id == $this->id );
    }

    public function isReceiver(Conversation $conv): bool
    {
        return ( $conv->target_convesationable_type == get_class($this) ) &&
            ($conv->target_convesationable_id == $this->id );
    }

    public function hasConversation(Conversation|null $record): bool
    {
        if($record === null){
            return true;
        }

        if( !$this->isSender($record) && !$this->isReceiver($record) ){
            return false;
        }

        return true;
    }
}
