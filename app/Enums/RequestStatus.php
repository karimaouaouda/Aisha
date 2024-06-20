<?php

namespace App\Enums;

enum RequestStatus : string
{
    use BaseEnum;

    case WAITING = 'waiting';


    case REJECTED = 'rejected';

    case ACCEPTED = 'accepted';
}
