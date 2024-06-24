<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum AppointmentStatus : string
{
    use EnumTrait;

    case WAITING = 'waiting';

    case ACCEPTED = 'accepted';

    case REJECTED = 'rejected';

    case DONE = 'done';
}
