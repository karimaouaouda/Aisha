<?php

namespace App\Traits\Blog;

use App\Models\Blog\Comment;
use App\Models\Blog\Interaction;
use App\Models\Blog\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Config;

/**
 * @mixin User
*/
trait CanInetract
{

    public function interacts(): MorphMany
    {
        return $this->morphMany(
            Interaction::class,
            Config::get('interact.name', 'interactable')
        );
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(
            Comment::class,
            Config::get('interact.name', 'interactable')
        );
    }
}
