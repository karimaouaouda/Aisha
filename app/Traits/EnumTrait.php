<?php

namespace App\Traits;

trait EnumTrait
{
    public static function values(){
        $values = [];
        foreach( self::cases() as $case ){
            $values[] = $case->value;
        }

        return $values;
    }
}
