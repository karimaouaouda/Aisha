<?php

namespace App\Enums;

enum ChatTypes : string
{
    use BaseEnum;

    case ALERT = 'alert';

    case REQUEST = 'request';

    case NORMAL = 'normal';
}
