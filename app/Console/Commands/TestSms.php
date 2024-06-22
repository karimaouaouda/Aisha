<?php

namespace App\Console\Commands;

use App\Models\Auth\Patient;
use App\Notifications\TestNotification;
use Illuminate\Console\Command;

class TestSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:sms';

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
        $patient = Patient::find(11);

        try{
            $patient->notify(new TestNotification());
        }catch(\Exception $e){
            $this->output->info($e->getMessage());
        }
    }
}
