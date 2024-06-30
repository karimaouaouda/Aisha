<?php

namespace App\Services\Ai;

use App\Services\Base\HuggingFaceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;

class TextEmotionService extends HuggingFaceService
{

    public static function classify(string $prompt): array|string|JsonResponse
    {
        $static = new static;

        return $static->classifyText($prompt);
    }

    public function classifyText(string $prompt) : string|array|JsonResponse
    {
        try{
            return $this->parseEmotions($this->requestData($prompt)->body());
        }catch (\Exception $e){
            dd($e);
            return $this->classifyText($prompt);
//            return response()->json([
//                'status' => 'failed',
//                'message' => 'our Model is loading, try resend the same message'
//            ]);
        }

    }

    protected function parseEmotions(string $array): array
    {
        $data = json_decode($array, true)[0];

        $emotions = [];

        foreach ($data as $emotion){
            $emotions[$emotion['label']] = $emotion['score'];
        }

        return $emotions;
    }


    function setEndPoint(): void
    {
        $this->endpoint = Config::get('app.models.text_emotion.api_endpoint');
    }
}
