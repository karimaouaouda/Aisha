<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Services\Ai\GeminiService;
use App\Services\Ai\TextEmotionService;
use App\Services\Ai\VoiceEmotionService;
use App\Services\Logger;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function __construct(
        protected StatefulGuard $guard,
        protected Logger $logger,
    ){
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('chat');
    }

    public function send(Request $request): JsonResponse
    {
        $request->validate([
            'message' => ['required', 'min:2']
        ]);

        //dd('here');

        $channel = $this->logger->newChannel();

        $message = $request->input('message');

        $channel->addToContent('message received from user : ' . $message);

        if( $request->hasFile('audio') ){
            $data = VoiceEmotionService::process(
                $request->file('audio')
            );

            $channel->addToContent('message has an audio, processing audio ...');
        }else{
            $emotions = TextEmotionService::classify($message);

            $data = [
                'filling' => array_keys($emotions)[0],
                'path' => null
            ];

            $channel->addToContent('message has no audio, trying to processing text ...');
        }

        $channel->addToContent('send to gemini : ' . $message);

        $response = GeminiService::send($message);

        $channel->addToContent('gemini response with that message : ' . $response);

        $message = new Message([
            "patient_id" => $this->guard->id(),
            "content" => $message,
            "filling" => $data['filling'],
            "audio_path" => $data['path'],
            'gpt_response' => $response
        ]);

        $channel->addToContent('data stored to database : ' . $message);

        $message->save();

        $channel->addToContent('successfully message sent');

        $channel->store();

        return response()->json([
            "content" => formatNormalMessage($response), //$process->output(),
        ], 200);

    }


}
