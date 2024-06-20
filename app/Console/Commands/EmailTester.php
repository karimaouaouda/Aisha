<?php

namespace App\Console\Commands;

use App\Models\Auth\Doctor;
use App\Notifications\TestNotification;
use Illuminate\Console\Command;

class EmailTester extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:email';

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
        $doctor = Doctor::find(1);

        try{
            $doctor->notify(new TestNotification());
            $this->output->info('email sent successfully');
        }catch(\Exception $e){
            $this->output->info($e->getMessage());
        }

    }
}
