<?php

namespace App\Http\Controllers;

use App\Chain\FirstChain;
use App\Chain\SecondChain;
use App\Models\Article;
use App\Models\Auth\Doctor;
use App\Models\Message;
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
    public function send(Request $request)
    {
        $message = $request->input('message');

        if ($request->hasFile("audio")) {
            $audio_data = $this->processAudio($request->file("audio"));
        } else {

            $audio_data = [
                "filling" => "unknown",
                "path" => "unknown"
            ];
        }


        $client = new Client("AIzaSyAXCj72FC7XYaYZTSVqST7JFaua-yw9bnI");

        $response = $client->geminiPro()->generateContent(
            new TextPart($message)
        );


        $content = $response->text();

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


    public function chain(Request $request)
    {
        return (new Pipeline(app()))->send("hi there")->through(
            FirstChain::class,
            SecondChain::class
        )->via("handle")->thenReturn();
    }

    public function processAudio(UploadedFile $audio)
    {
        $path = 'public/audio/_' . auth()->user()->id;

        // Generate a unique filename for the WAV file

        $uniqueid = uniqid();
        $filename = $uniqueid . '.wav';

        // Save the uploaded file as a WAV file
        $path = $audio->storeAs($path, $filename);

        $full_path = base_path('/storage/app/' . $path);


        $command = $this->pythonExe . " " . $this->main . " " . $this->modelJson . " " . $this->modelArgs . " " . $full_path;


        $process = Process::run($command);

        $fillings = (explode("\n", $process->output()))[3];

        return [
            "path" => $path,
            "filling" => $fillings
        ];
    }



    public function create()
    {
        $messages = Auth::user()->messages;

        return view('chat', compact('messages'));
    }


    public function upload(Request $request)
    {
        // Check if a file was uploaded
        if ($request->hasFile('audio')) {
            // Get the uploaded file
            $audio = $request->file('audio');

            $path = 'public/audio/_' . auth()->user()->id;

            // Generate a unique filename for the WAV file

            $uniqueid = uniqid();
            $filename = $uniqueid . '.wav';

            // Save the uploaded file as a WAV file
            $path = $audio->storeAs($path, $filename);

            $full_path = base_path('/storage/app/' . $path);


            $command = $this->pythonExe . " " . $this->main . " " . $this->modelJson . " " . $this->modelArgs . " " . $full_path;

            //dd($command);

            $process = Process::run($command);

            dd($process->output());

            $fillings = (explode("\n", $process->output()))[3];

            // Return the filename or any other response as needed
            return response()->json(['uniqueid' => $uniqueid]);
        }

        // Return an error response if no file was uploaded
        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
