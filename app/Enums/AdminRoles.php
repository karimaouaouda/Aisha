<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum AdminRoles : string
{
    use EnumTrait;
    case SUPER = "super";

    case ANALYZER = "analyzer";




}
