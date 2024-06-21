<?php

namespace App\Http\Controllers\Medical;

use App\Enums\ChatTypes;
use App\Enums\IOTTopics;
use App\Http\Controllers\Controller;
use App\Models\Auth\Doctor;
use App\Models\Auth\Patient;
use App\Models\Base\Chat;
use App\Models\Base\Conversation;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    protected $doctor;

    public function __construct()
    {
        $this->doctor = Auth::guard('doctor')->user();
    }

    public function alert(Patient $patient, Request $request): JsonResponse
    {

        if(!$this->doctor){
            return response()->json([
                'status' => 'failed',
                'message' => 'you must be a doctor to do that',
            ]);
        }

        $request->validate([
            'alert_subject' => ['required'],
            'alert_content' => ['required'],
            'topic' => ['required', 'in:' . implode(',', IOTTopics::values())]
        ]);

        if( ($conversation_id = $this->doctor->hasConversationWith($patient) ) ){
            $chat = new Chat([
                'conversation_id' => $conversation_id,
                'source_conversationable_type' => get_class($this->doctor),
                'source_conversationable_id' => $this->doctor->id,
                'target_conversationable_type' => get_class($patient),
                'target_conversationable_id' => $patient->id,
                'type' => ChatTypes::ALERT->value,
                'content' => "{$request->input('topic')}|{$request->input('alert_subject')}|{$request->input('alert_content')}",
                'image' => null
            ]);

            $chat->save();
        }else{
            DB::transaction(function() use ($patient, $request){
                $conversation = new Conversation([
                    'source_conversationable_type' => get_class($this->doctor),
                    'source_conversationable_id' => $this->doctor->id,
                    'target_conversationable_type' => get_class($patient),
                    'target_conversationable_id' => $patient->id,
                    'starts_at' => now()
                ]);

                $conversation->save();

                $chat = new Chat([
                    'conversation_id' => $conversation->id,
                    'type' => ChatTypes::ALERT->value,
                    'content' => "{$request->input('topic')}|{$request->input('alert_subject')}|{$request->input('alert_content')}",
                    'image' => null
                ]);

                $chat->save();
            });
        }

        Notification::make()
            ->title("doctor : {$this->doctor->name} alert you ")
            ->actions([
                Action::make('messages')
                    ->url(url('/conversations/' . $this->doctor->id . '/inbox'))
                    ->label('see in messages'),
            ])
            ->sendToDatabase($patient)
            ->send();

        return response()->json([
            'status' => 'success',
            'message' => 'successfully alerted'
        ]);

    }
}
