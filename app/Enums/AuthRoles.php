<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum AuthRoles : string
{
    use EnumTrait;
    case ADMIN = "admin";

    case DOCTOR = "doctor";

    case PATIENT = "patient";
}
