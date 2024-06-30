<?php


namespace App\Services\Ai;


use App\Models\Auth\Patient;
use App\Services\Base\HuggingFaceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class PostAnalysisService extends HuggingFaceService
{

    public static function detectFromText($text){
        $static = new static;

        return $static->extractdiseases($text);
    }

    public static function getAnalysisFor(Patient $patient): \Illuminate\Support\Collection
    {
        return DB::table('post_analyses')
                    ->where('patient_id', $patient->id)
                    ->get();

    }

    protected function extractdiseases($text)
    {
        $response = $this->requestData($text);

        if( $response instanceof JsonResponse){
            return $response;
        }
        return $this->parse(
            $response->body()
        );
    }

    protected function parse(string $data): array
    {
        $parsed =  json_decode($data, true)[0];

        $diseases = [];
        foreach ($parsed as $disease){
            $diseases[$disease['label']] = $disease['score'];
        }

        return $diseases;
    }


    function setEndPoint(): void
    {
        $this->endpoint = Config::get('app.models.post_analytics.api_endpoint');
    }
}
