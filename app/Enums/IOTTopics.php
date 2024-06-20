<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum IOTTopics : string
{
    use EnumTrait;

    case HEART_BEATS = "heart_beats";

    case BLOOD_PRESSURE = "blood_pressure";

    case AIR_QUALITY = "air_quality";

    case GLUKOZ = "glukoz";

    case USER_TEMPERATURE = "temperature/user";

    case HOUSE_TEMPERATURE = "temperature/house";

}
