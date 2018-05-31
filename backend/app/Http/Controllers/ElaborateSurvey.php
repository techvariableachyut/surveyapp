<?php

namespace App\Http\Controllers;

use Auth;
use App\Answers;
use App\Sections;
use App\Questions;
use App\Dropdownvalues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElaborateSurvey extends Controller{

    private $completed = 0;
    private $reviewed = 0;
    private $monitors = ["Monitor 1" => 0,"Monitor 2" => 0,"Monitor 3" => 0,"Monitor 4" => 0,"Monitor 5" => 0,"Monitor 6" => 0,"Monitor 7" => 0,"Monitor 8" => 0,"Monitor 9" => 0,"Monitor 10" => 0];
    private $genderAware = 0;
    private $furtherAnalysis = 0;
    private $genderSources = ["male" => 0, "female" => 0, "trans" => 0];
    private $imageSources = ["male" => 0, "female" => 0, "trans" => 0];
    private $reporterProportion = ["total" => 0, "male" => 0,"female" => 0,"trans" => 0, "unknown" => 0];
    private $presenterProportion = ["total" => 0, "male" => 0,"female" => 0,"trans" => 0, "unknown" => 0];
    private $questionsSet = array(
        "monitor"=> "question991",
        "newsSource"=> array (
            "female"=> "question022",
            "male"=>"question023",
            "trans"=>"question024",
        ),
        "image"=> array(
            "totalperson"=>"question071",
            "female"=>"question59",
            "male"=>"question60",
        ),
        "genderanalysis"=>array(
            "genderaware"=>"question066",
            "furtheranalysis"=> "question070"
        ),
       "reporter"=> array(
           "total"=>"question054",
           "female"=>"question055",
           "male"=>"question056",
           "trans"=>"question057",
           "unknown"=>"question058"
       ),
       "presenter"=> array(
           "total"=>"question059",
           "female"=>"question060",
           "male"=>"question061",
           "trans"=>"question062",
           "unknown"=>"question063"
       ),    
    );

    public function elaborate($surveyId){
        $answers = DB::table('answers')->where('surveyId',$surveyId)->get();
        $survey = DB::table('questions')->where('token',$surveyId)->first();
        $surveyTitle = $survey->title;
        $this->completed($answers);
        $this->reviewed($answers);
        $this->monitor($answers);

        $totalResponse = count($answers); $completed = $this->completed;$reviewed = $this->reviewed; $monitors = $this->monitors; $genderSources = $this->genderSources; $imageSources = $this->imageSources; $reporterProportion = $this->reporterProportion; $presenterProportion = $this->presenterProportion;$genderAware = $this->genderAware;$furtherAnalysis = $this->furtherAnalysis;

        return view("elaborate.index",compact(
            'totalResponse',
            'surveyTitle',
            'completed',
            'reviewed',
            'monitors',
            'genderSources',
            'imageSources',
            'reporterProportion',
            'presenterProportion',
            'genderAware',
            'furtherAnalysis'
        ));
    }

    private function completed($answers){
        foreach ($answers as $answer) {
            if ($answer->done == "Completed") {
                $this->completed = $this->completed + 1;
            }
        }
    }

    private function reviewed($answers){
        foreach ($answers as $answer) {
            if ($answer->done == "Reviewed") {
                $this->reviewed = $this->reviewed + 1;
            }
        }
    }

    private function monitor($answers){
        foreach ($answers as $index => $answer) {
            $data =  json_decode($answer->answer);
            // dd($data->data);
            $monitor = $data->data->question991;

            $this->sourcesByGender($data);
            $this->proportionImage($data);
            $this->genderAnalysis($data);
            $this->reporterProportion($data);
            $this->presenterProportion($data);

            for ($i=1; $i <= 10; $i++) { 
                if($monitor === "Monitor" . " " . (string) $i){
                    $this->monitors[$monitor] = $this->monitors[$monitor] + 1;
                }
            }
        }

    }

    private function sourcesByGender($data){
        $this->genderSources["female"] = $this->genderSources["female"] +  isset($data->data->question022) ? (int) $data->data->question022 : 0;
        $this->genderSources["male"] = $this->genderSources["male"] +  isset($data->data->question023) ? (int) $data->data->question023 : 0;
        $this->genderSources["trans"] = $this->genderSources["trans"] +  isset($data->data->question024) ? (int) $data->data->question024 : 0;   
    }

    private function proportionImage($data){
        $this->imageSources["female"] = $this->imageSources["female"] +  isset($data->data->question059) ? (int) $data->data->question059 : 0;
        $this->imageSources["male"] = $this->imageSources["male"] +  isset($data->data->question060) ? (int) $data->data->question060 : 0;
        $this->imageSources["trans"] = isset($data->data->question071) ? (int) $data->data->question071 : 0 - $this->imageSources["female"] + $this->imageSources["male"];
    }

    private function genderAnalysis($data){
        $this->genderAware = $this->genderAware +  isset($data->data->question066) ? (int) $data->data->question066 : 0;
        $this->furtherAnalysis = $this->furtherAnalysis + isset($data->data->question070) ? (int) $data->data->question070 : 0;
    }

    private function reporterProportion($data){
        $this->reporterProportion["total"] = $this->reporterProportion["total"] +  isset($data->data->question054) ? (int) $data->data->question054 : 0;
        $this->reporterProportion["female"] = $this->reporterProportion["female"] +  isset($data->data->question055) ? (int) $data->data->question055 : 0;
        $this->reporterProportion["male"] = $this->reporterProportion["male"] +  isset($data->data->question056) ? (int)  $data->data->question056 : 0;
        $this->reporterProportion["trans"] = $this->reporterProportion["trans"] +  isset($data->data->question057) ? (int) $data->data->question057 : 0;
        $this->reporterProportion["unknown"] = $this->reporterProportion["unknown"] +  isset($data->data->question058) ? (int) $data->data->question058 : 0;
    }


    private function presenterProportion($data){
        $this->presenterProportion["total"] = $this->presenterProportion["total"] +  isset($data->data->question059) ? (int) $data->data->question059 : 0;
        $this->presenterProportion["female"] = $this->presenterProportion["female"] +  isset($data->data->question060) ? (int) $data->data->question060 : 0;
        $this->presenterProportion["male"] = $this->presenterProportion["male"] +  isset($data->data->question061) ? (int) $data->data->question061 : 0;
        $this->presenterProportion["trans"] = $this->presenterProportion["trans"] +  isset($data->data->question062) ? (int) $data->data->question062 : 0;
        $this->presenterProportion["unknown"] = $this->presenterProportion["unknown"] +  isset($data->data->question063) ? (int) $data->data->question063 : 0;
    }


}
