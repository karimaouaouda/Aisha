<?php

namespace App\Services\Ai;

use App\Services\Base\HuggingFaceService;
use App\Services\Logger;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;

class TextEmotionService extends HuggingFaceService
{

    protected Logger\LoggerChannel $channel;
    public static function classify(string $prompt): array|string|JsonResponse
    {
        $static = new static;
        $static->channel = (new Logger('logs/errors'))->newChannel();

        return $static->classifyText($prompt);
    }

    public function classifyText(string $prompt) : string|array|JsonResponse
    {
        try{
            $this->channel->addToContent('trying to access : ' . $this->endpoint . ' with api key : ' .$this->api_key);
            return $this->parseEmotions($this->requestData($prompt)->body());
        }catch (\Exception $e){
            $this->channel->addToContent('faced problem : '.$e->getMessage());
            $this->channel->store();
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
