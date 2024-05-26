<?php

namespace App\Console\Commands;

use App\Exceptions\FailedAnalyzingException;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class Analyzer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'analyzer:run {--audio=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'start the analyzer';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        //analyzer:run  --audio=D:\projects\pysharm\analyzer\predictor\AudioProcessing\try.wav
        $python = env('PY_EXE', "pyth");
        $main = env('MAIN_PY');
        $modelJson = env('MODEL_JSON');
        $modelArgs = env('MODEL_ARGS');
        $audio = $this->option("audio");
        
        try{
            dd("$python");
            $process = Process::run("$python $main $modelJson $modelArgs $audio");
        }catch(Exception $e){
            $this->info("sorry some thing");
        }

        $parts = explode("\n", $process->output());

        dd($process->output());

        if(!isset($parts[3])){
            throw new FailedAnalyzingException("failed to analyze your audio file . " .  $process->output());
        }

        $this->info($parts[3]);

        return $parts[3];
    }
}
