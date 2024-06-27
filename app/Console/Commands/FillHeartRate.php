<?php

namespace App\Console\Commands;

use App\Enums\IOTTopics;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FillHeartRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fill:heart-rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = [];
        $id = 1;
        $topic = IOTTopics::HEART_BEATS->value;

        $start = now()->subMonth()->setHour(8)->setMinute(0)->setSecond(0);


        for($i = 0; $i < 60 ; $i++){
            $start->addMinute();

            DB::table('iot_data')
                    ->insert([
                        'patient_id' => $id ,
                        'topic' => $topic,
                        'data' => json_encode(['heart beats' => rand(40, 120)]),
                        'created_at' => $start,
                        'updated_at' => $start
                    ]);
        }
    }
}
