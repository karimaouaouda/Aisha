<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;


    protected $fillable = [
        'commentable_type',
        'commentable_id',
        'comment'
    ];



    public function commentables(): MorphTo
    {
        return $this->morphTo();
    }
}
