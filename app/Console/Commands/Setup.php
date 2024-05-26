<?php

namespace App\Console\Commands;

use App\Models\Medicine;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup {--users}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create the needed records';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $methods = ["after", "before", "middle"];
        $names = [
            "solyne MG+ 300g",
            "smekta 600g minimes",
            "erika 300g redpull"
        ];
        $medicines = [
            "table" => "medicines",
            "records" => array_map(function($name) use ( $methods ){
                return [
                    'name'=> $name,
                    'count' => rand(1, 3),
                    'method' => $methods[rand(0, 2)],
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }, $names),

        ];

        $this->withProgressBar($medicines['records'], function($info){
            $model = new Medicine($info);

            $model->save();

            $this->newLine();
            $this->info("medicine created");
            $this->newLine();
        });

        $this->newLine();

        if($this->hasOption('users')){
            Artisan::call('make:default-users');
        }

    }
}
