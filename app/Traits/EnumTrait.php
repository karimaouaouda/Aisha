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

    public static function valuesWithKeys(): array
    {
        $values  = [];

        foreach (self::cases() as $case){
            $values[$case->value] = $case->name;
        }

        return $values;
    }
}
