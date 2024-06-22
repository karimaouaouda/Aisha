<?php

namespace App\Services\Ai;

use App\Services\Base\HuggingFaceService;
use Illuminate\Support\Facades\Config;

class TextEmotionService extends HuggingFaceService
{

    public static function classify(string $prompt): array|string
    {
        $static = new static;

        return $static->classifyText($prompt);
    }

    public function classifyText(string $prompt) : string|array
    {
        return $this->parseEmotions($this->requestData($prompt)->body());
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
