<?php


namespace App\Services\Ai;


use App\Services\Base\HuggingFaceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;

class PostAnalysisService extends HuggingFaceService
{

    public static function detectFromText($text){
        $static = new static;

        return $static->extractdiseases($text);
    }

    protected function extractdiseases($text)
    {
        $response = $this->requestData($text);

        if( $response instanceof JsonResponse){
            return $response;
        }
        return $this->parse(
            $response->body()
        );
    }

    protected function parse(string $data): array
    {
        $parsed =  json_decode($data, true)[0];

        $diseases = [];
        foreach ($parsed as $disease){
            $diseases[$disease['label']] = $disease['score'];
        }

        return $diseases;
    }


    function setEndPoint(): void
    {
        $this->endpoint = Config::get('app.models.post_analytics.api_endpoint');
    }
}
