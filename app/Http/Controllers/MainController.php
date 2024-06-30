<?php

namespace App\Http\Controllers;

use App\Chain\FirstChain;
use App\Chain\SecondChain;
use App\Models\Article;
use App\Models\Auth\Doctor;
use App\Models\Base\Conversation;
use App\Models\Message;
use Filament\Facades\Filament;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Process;
use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;


class MainController extends Controller
{

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('discover.index');
    }

    public function startConversation(Authenticatable $user){
        $current = Filament::auth()->user();

        $conversation_id = $current->hasConversationWith($user);
        if( $conversation_id === false ){
            $conversation = Conversation::create([
                'source_conversationable_type' => get_class($current),
                'source_conversationable_id' => $current->id,
                'target_conversationable_type' => get_class($user),
                'target_conversationable_id' => $user->id
            ]);

            $conversation->save();

            $conversation_id = $conversation->id;
        }

    }
}
