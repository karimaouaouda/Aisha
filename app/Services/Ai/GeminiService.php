<?php

namespace App\Services\Ai;


use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;
use Illuminate\Support\Facades\Config;

class GeminiService
{
    protected string $api_key;

    public Client $client;
    public function __construct(){
        $this->api_key = Config::get('app.models.gemini.api_key');

        $this->client = new Client($this->api_key);
    }


    public static function send($message) : string
    {
        $ai = new static;

        $response = $ai->client->geminiPro()->generateContent(
            new TextPart($message)
        );

        return $response->text();
    }



}
