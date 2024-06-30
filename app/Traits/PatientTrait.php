<?php

namespace App\Traits;

use App\Models\Auth\Patient;
use App\Services\Ai\PostAnalysisService;
use App\Services\Builders\MessageBuilder;
use Illuminate\Support\Facades\DB;

/**
 * @mixin Patient
*/
trait PatientTrait
{

    protected string $promptFormat = "I am a patient, I feel like [feeling], I could be suffering from this diseases [diseases] , i have some data detected from IOT devices : [data], [message]";
    public function lastData()
    {
        $iot = $this->iot_data()->whereBetween('created_at', [now()->subDay(), now()->addDay()])->get();

        $ud = $this->user_data()->whereBetween('created_at', [now()->subDay(), now()->addDay()])->get();

        return $iot->merge($ud);
    }

    public function maxDiseaseValue(): float
    {
        return 0.35;
    }

    public function possibleDiseases(){

        $data = PostAnalysisService::getAnalysisFor($this);
        $maxValue  = $this->maxDiseaseValue();

        $possible_diseases = [];

        foreach ($data as $analyse){
            $diseases = json_decode(json_decode($analyse->diseases_expected, true), true);


            foreach ($diseases['with_gemini'] as $disease => $score){
                if($score > $maxValue){
                    $possible_diseases[] = $disease;
                }
            }

            foreach ($diseases['just_client'] as $disease => $score){
                if($score > $maxValue){
                    if( !isset($possible_diseases[$disease]) || $possible_diseases[$disease] < $score ){
                        $possible_diseases[] = $disease;
                    }
                }
            }
        }

        return $possible_diseases;
    }

    public function reformulateMessage(string $message, string $feeling) : string
    {
        $builder = MessageBuilder::use($this->promptFormat)
            ->with($message);

        $builder->appendText('feeling', $feeling);

        $data = $this->lastData()->pluck('data', 'topic');

        foreach ($data as $topic => $d){
            if(!is_numeric($data)){
                $data[$topic] = array_values(json_decode($d, true))[0];
            }
        }

        $diseases = $this->possibleDiseases();

        return $builder->appendArray('data', $data->toArray())
                            ->appendArray('diseases', $diseases)
                            ->build();

    }

    public function postAnalysis(): \Illuminate\Database\Query\Builder
    {
        return DB::table('post_analyses')
                        ->where('patient_id', $this->id);
    }

    public function lastPostAnalysis(): \Illuminate\Support\Collection
    {
        return $last = $this->postAnalysis()
                                ->orderBy('created_at', 'desc')
                                ->limit(1)
                                ->get();
    }

}
