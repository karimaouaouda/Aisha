<?php


namespace App\Services\Ai;

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;
use GeminiAPI\Responses\GenerateContentResponse;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class EntityRecognitionService{

    protected string $api_endpoint;

    public function __construct(){
        $this->api_endpoint = Config::get('app.models.ner.api_endpoint');
    }

    public static function getEntities($text): JsonResponse|array|null
    {
        $service = new self;

        return $service->entities($text);
    }



    public function entities($text): JsonResponse|array|null
    {
        $token = env('HUGGING_FACE_API_KEY');

        $headers = [
            'Authorization' => "Bearer {$token}"
        ];

        $payload = [
            'inputs' => $text
        ];

        try{
            $response = Http::withHeaders($headers)
                ->retry(3)
                ->post($this->api_endpoint , $payload);
        }catch(ConnectionException $e){
            return response()->json([
                'message' => 'connection failed : ' . $e->getMessage(),
            ]);
        }

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


}
