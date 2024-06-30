<?php

namespace App\Services\Ai;


use GeminiAPI\Client;
use GeminiAPI\Enums\Role;
use GeminiAPI\Resources\Content;
use GeminiAPI\Resources\Parts\TextPart;
use Illuminate\Support\Facades\Config;
use Psr\Http\Client\ClientExceptionInterface;

class GeminiService
{

    protected string $prompt = "role system : now you are talking to a patient of a medical website
     you must not response to non medical queries, we will provide you with patient query and
     some of his health analytics, try to talk to him like a doctor on top of his analytics";



    protected string $api_key;

    public Client $client;
    public function __construct(){
        $this->api_key = Config::get('app.models.gemini.api_key');

        $this->client = new Client($this->api_key);
    }


    /**
     * @throws ClientExceptionInterface
     */
    public static function send($message, bool $isOneTimeMessage = false) : string
    {
        $ai = new static;

        if(!$isOneTimeMessage){
            return $ai->sendMessage($message);
        }

        return $ai->sendOneTimeMessage($message);
    }


    /**
     * @throws ClientExceptionInterface
     */
    protected function sendMessage($message): string
    {
        $chat = $this->client->geminiPro()->startChat();

        $patient  = auth('patient')->user();

        $messages = $patient->messages;

        $history = [];

        $this->appendPrompt($history);

        $messages->map(function($message) use (&$history){
            $history[] = new Content([new TextPart($message->content)], Role::User);

            $history[] = new Content([new TextPart($message->gpt_response)], Role::Model);
        });

        $response = $chat->withHistory($history)
                ->sendMessage(
                    new TextPart($message)
                );

        return $response->text();
    }
    private function appendPrompt(array &$history): void
    {
        $history[] = new Content([new TextPart($this->prompt)], Role::User);
    }

    protected function sendOneTimeMessage(string $message): string
    {
        $response = $this->client->geminiPro()->generateContent(
            new TextPart($message)
        );

        return $response->text();
    }

}
