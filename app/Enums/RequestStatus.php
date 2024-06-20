<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum RequestStatus : string
{
    use EnumTrait;

    case WAITING = 'waiting';


    case REJECTED = 'rejected';

    case ACCEPTED = 'accepted';
}
