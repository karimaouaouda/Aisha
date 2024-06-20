<?php

namespace App\Enums\Blog;

use App\Enums\BaseEnum;

enum Interaction : string
{
    use BaseEnum;
    case HEART = 'heart';

    case LIKE = 'like';

    case SAD = 'sad';
}
