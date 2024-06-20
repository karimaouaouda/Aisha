<?php

namespace App\Console\Commands;

use App\Models\Analysis\PostAnalyse;
use App\Models\Auth\Patient;
use App\Services\Ai\EntityRecognitionService;
use App\Services\Ai\GeminiService;
use App\Services\Ai\PostAnalysisService;
use Illuminate\Console\Command;
use Psr\Http\Client\ClientExceptionInterface;

class MakePostAnalysis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:post-analysis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command will start a post analysis';

    /**
     * Execute the console command.
     * @throws ClientExceptionInterface
     */
    public function handle()
    {
        $patients = Patient::all();

        $this->withProgressBar($patients, function($patient){

            if( $this->makePostAnalyseFor($patient) ){

                $this->output->info('post analysis work fine for : '. '#'. $patient->id.'-'. $patient->name );
            }else{
                $this->output->error("post analysis didn't fine for : " . '#' . $patient->id . '-' . $patient->name);
            }

            $this->output->newLine();
        });
    }

    /**
     * @throws ClientExceptionInterface
     */
    private function makePostAnalyseFor(Patient $patient): bool
    {

        $messages = $patient->messages()->get(['id', 'content']);

        $from_message = $messages->first()->id;

        $to_message = $messages->last()->id;

        $combinedMessage = $messages->implode('content', '. ');

        $geminiCombinedMessage = $combinedMessage . $messages->implode('gpt_responses', '. ');

        $entities = EntityRecognitionService::getEntities($combinedMessage);

        $geminiEntities = EntityRecognitionService::getEntities($geminiCombinedMessage);

        if(is_array($entities) && is_array($geminiEntities)) {


            $entriesAsText = arrtotext($entities, '=>', ',');

            $geminiEntriesAsText = arrtotext($geminiEntities, '=>', '. ');

            $this->output->info($entriesAsText);

            $prompt = "hello Gemini you are now being used as an integrated API in our smart assistant
            directed to mostly sick people after we did the features extraction from the user inquiry
             using an AI model we got all the medical terms and information that we can extract from
              the user we're going to need you to make useful sentence from them without missing
              anything in the sentence from the provided information from the array : " . $entriesAsText . " it's important to note that the sentence that you will provide will be sent to something to disease model powered by AI so if that might help you put it in Easy form to be detected do it";

            $geminiPrompt =  "hello Gemini you are now being used as an integrated API in our smart assistant
            directed to mostly sick people after we did the features extraction from the user inquiry
             using an AI model we got all the medical terms and information that we can extract from
              the user we're going to need you to make useful sentence from them without missing
              anything in the sentence from the provided information from the array : " . $geminiEntriesAsText . " it's important to note that the sentence that you will provide will be sent to something to disease model powered by AI so if that might help you put it in Easy form to be detected do it";

            $summarizedText = GeminiService::send($prompt);

            $geminiSummarizedText = GeminiService::send($geminiPrompt);

            $geminiDiseases = PostAnalysisService::detectFromText($geminiSummarizedText);

            $diseases = PostAnalysisService::detectFromText($summarizedText);

            PostAnalyse::create([
                'patient_id' => $patient->id,
                'start_from_message' => $from_message,
                'stop_at_message' => $to_message,
                'source_text' => json_encode([
                    'with_gemini' => $geminiSummarizedText,
                    'just_client' => $summarizedText
                ]),
                'diseases_expected' => json_encode([
                    'with_gemini' => $geminiDiseases,
                    'just_client' => $diseases
                ]),
            ])->save();
            return true;
        }else{
            return false;
        }
    }
}
