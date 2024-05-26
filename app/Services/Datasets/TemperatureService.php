<?php

namespace App\Services\Datasets;

use App\Services\DatasetService;
use Illuminate\Support\Carbon;

abstract class TemperatureService extends DatasetService{

    protected static array $headers = ["date", "temperature"];

    protected static string $filename = "water.csv";

    public static function generate($count){
        $data = [];
        $d = [];
        $labels = [];
        for($i = 0; $i < $count ; $i++){
            $v = [];
            foreach(self::$headers as $header){
                
                if( $header == "date" ){
                    $value = Carbon::create(
                        rand(now()->year, now()->year + 1),
                        rand(1, 12),
                        rand(1, 31),
                        rand(0, 23),
                        rand(0, 59),
                        rand(0, 59)
                    );

                    $labels[] = $value->format("d-m-y");
                }else{
                    $n = rand(20, 50);
                    $value =  $n ;
                    $d[] = $value;
                }

                $v[$header] = $value;
            }
            $data[] = $v;
        }

        return [
            "data" => $d,
            "labels" => $labels,
        ];
    }

}