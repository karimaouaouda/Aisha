<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum ChatTypes : string
{
    use EnumTrait;

    case ALERT = 'alert';

    case REQUEST = 'request';

    case NORMAL = 'normal';
}
