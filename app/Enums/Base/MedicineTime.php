<?php

namespace App\Enums\Base;

use App\Traits\EnumTrait;

enum MedicineTime : string
{
    use EnumTrait;

    case BEFORE_BREAKFAST = 'before_breakfast';

    case BEFORE_LAUNCH = 'before_launch';

    case BEFORE_DINNER = 'before_dinner';

    case AFTER_BREAKFAST = 'after_breakfast';

    case AFTER_LAUNCH = 'after_launch';

    case AFTER_DINNER = 'after_dinner';

}
