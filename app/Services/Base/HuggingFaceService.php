<?php

namespace App\Services\Base;

use Doctrine\DBAL\Exception\NoKeyValue;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

abstract class HuggingFaceService implements HuggingFaceServiceInterface
{
    protected string $api_key;

    protected string $endpoint;

    protected array $headers;

    /**
     * @throws NoKeyValue
     */
    public function __construct(){
        if( env('HUGGING_FACE_API_KEY') == null ){
            throw new NoKeyValue('no value for ' . 'HUGGING_FACE_API_KEY' );
        }

        $this->api_key = env('HUGGING_FACE_API_KEY');

        $this->headers = [
            'Authorization' => "Bearer {$this->api_key}"
        ];

        $this->setEndPoint();
    }


    protected function requestData($input): PromiseInterface|JsonResponse|Response
    {
        $payload = [
            'inputs' => $input
        ];

        try{
            $response = Http::withHeaders($this->headers)
                ->retry(3)
                ->post($this->endpoint , $payload);
        }catch(ConnectionException|RequestException $e){
            return response()->json([
                'message' => 'connection failed : ' . $e->getMessage(),
            ]);
        }

        return $response;
    }
}
