<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;







    public function interactions(): HasMany
    {
        return $this->hasMany(Interaction::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
