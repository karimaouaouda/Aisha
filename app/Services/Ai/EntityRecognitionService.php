<?php


namespace App\Services\Ai;

use App\Services\Base\HuggingFaceService;
use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;
use GeminiAPI\Responses\GenerateContentResponse;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class EntityRecognitionService extends HuggingFaceService{


    public static function getEntities($text): JsonResponse|array|null
    {
        $service = new self;

        return $service->entities($text);
    }



    public function entities($text): JsonResponse|array|null
    {
        $response = $this->requestData($text);

        return $this->extractEntities($response);
    }


    private function extractEntities(PromiseInterface|Response $response): ?array
    {

        $body = json_decode($response->body(), true);

        if( !is_array($body)) {
            return null;
        }
        $entities = [];

        foreach ($body as $entity){

            $entities[$entity['word']] = $entity['entity_group'];

        }

        return $entities;

    }


    function setEndPoint(): void
    {
        $this->endpoint = Config::get('app.models.ner.api_endpoint');
    }
}
