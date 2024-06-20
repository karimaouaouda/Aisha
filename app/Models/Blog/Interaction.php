<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Config;

class Interaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'interactable_type',
        'interactable_id',
        'post_id',
        'interaction_type',
    ];


    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
