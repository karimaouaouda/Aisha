<?php

namespace App\Services;

use Illuminate\Support\Carbon;

abstract class DatasetService{

    protected static array $headers;

    protected static string $filename;

    public static function setFileName(string $filename){
        self::$filename = $filename;
    }

    public static function filename(){
        return self::$filename;
    }

}