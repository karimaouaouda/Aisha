<?php

namespace App\Services\Ai;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Process;

class VoiceEmotionService
{

    protected array $configs;

    public function __construct(){
        $this->configs = [
            'python' => env('PYTHON'),
            'script' => env('SCRIPT'),
            'model' => env('MODEL'),
            'args' => env('MODEL_ARGS')
        ];
    }

    public static function process(UploadedFile $file): array|JsonResponse
    {
        $static = new static;

        return $static->processAudio($file);
    }
    public function processAudio(UploadedFile $audio): \Illuminate\Http\JsonResponse|array
    {
        $path = $this->store($audio);

        $full_path = base_path('/storage/app/' . $path);

        $values = array_values($this->configs);

        $values[] = $full_path;

        $exec  = sprintf("%s %s %s %s %s", ...$values);

        $process = Process::run($exec);

        try{
            $fillings = (explode("\n", $process->output()))[3];
        }catch (\ErrorException $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'too long audio, audio must be greater then 2.5s'
            ]);
        }

        return [
            "path" => $path,
            "filling" => $fillings
        ];
    }


    protected function store(UploadedFile $file) : string
    {

        $path = 'public/audio/_' . auth('patient')->user()->id;

        $uniqueId = uniqid();
        $filename = $uniqueId . '.wav';

        // Save the uploaded file as a WAV file
        $path = $file->storeAs($path, $filename);

        return $path;

    }



}
