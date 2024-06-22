<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Services\Ai\GeminiService;
use App\Services\Ai\TextEmotionService;
use App\Services\Ai\VoiceEmotionService;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function __construct(
        protected StatefulGuard $guard,
    ){
    }

    public function create(){
        return view('chat');
    }

    public function send(Request $request): JsonResponse
    {
        $request->validate([
            'message' => ['required', 'min:2']
        ]);

        $message = $request->input('message');

        if( $request->hasFile('audio') ){
            $data = VoiceEmotionService::process(
                $request->file('audio')
            );
        }else{
            $emotions = TextEmotionService::classify($message);

            $data = [
                'filling' => array_keys($emotions)[0],
                'path' => null
            ];
        }

        $response = GeminiService::send($message);

        $message = new Message([
            "user_id" => auth()->user()->id,
            "content" => $message,
            "filling" => $audio_data['filling'],
            "audio_path" => $audio_data['path'],
            'gpt_response' => $content
        ]);

        $message->save();

        return response()->json([
            "content" => $content, //$process->output(),
        ], 200);

    }


}
