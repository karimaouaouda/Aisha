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
        if( ($key = Config::get('app.hugging_face_key', null)) == null ){
            throw new NoKeyValue('no value for ' . 'HUGGING_FACE_API_KEY' );
        }

        $this->api_key = $key;

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
                ->retry(5)
                ->post($this->endpoint , $payload);
        }catch(ConnectionException|RequestException $e){
            dd( $e->getMessage(), $this->api_key );
//            response()->json([
//                'message' => 'connection failed : ' . $e->getMessage(),
//            ]);

        }

        return $response;
    }
}
