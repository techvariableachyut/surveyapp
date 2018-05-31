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


    public function elaborate($surveyId){
        $answers = Answers::all();
        
        $survey = DB::table('questions')->where('token',$surveyId)->first();
        $surveyTitle = $survey->title;

        $this->completed($answers);
        $this->reviewed($answers);
        $this->monitor($answers);

        $totalResponse = count($answers); $completed = $this->completed;$reviewed = $this->reviewed; $monitors = $this->monitors; $genderSources = $this->genderSources; $imageSources = $this->imageSources; $reporterProportion = $this->reporterProportion; $presenterProportion = $this->presenterProportion;$genderAware = $this->genderAware;$furtherAnalysis = $this->furtherAnalysis;

        return view("elaborate.index",compact('totalResponse','surveyTitle','completed','reviewed','monitors','genderSources','imageSources','reporterProportion','presenterProportion','genderAware','furtherAnalysis'));
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
        $this->genderSources["female"] = $this->genderSources["female"] + (int) isset($data->data->question022) ? $data->data->question022 : 0;
        $this->genderSources["male"] = $this->genderSources["male"] + (int) isset($data->data->question023) ? $data->data->question023 : 0;
        $this->genderSources["trans"] = $this->genderSources["trans"] + (int) isset($data->data->question024) ? $data->data->question024 : 0;   
    }

    private function proportionImage($data){
        $this->imageSources["female"] = $this->imageSources["female"] + (int) isset($data->data->question059) ? $data->data->question059 : 0;
        $this->imageSources["male"] = $this->imageSources["male"] + (int) isset($data->data->question060) ? $data->data->question060 : 0;
        $this->imageSources["trans"] = (int) isset($data->data->question071) ? $data->data->question071 : 0 - $this->imageSources["female"] + $this->imageSources["male"];
    }

    private function genderAnalysis($data){
        $this->genderAware = $this->genderAware + (int) isset($data->data->question066) ? $data->data->question066 : 0;
        $this->furtherAnalysis = $this->furtherAnalysis + (int) isset($data->data->question070) ? $data->data->question070 : 0;
    }

    private function reporterProportion($data){
        $this->reporterProportion["total"] = $this->reporterProportion["total"] + (int) isset($data->data->question054) ? $data->data->question054 : 0;
        $this->reporterProportion["female"] = $this->reporterProportion["female"] + (int) isset($data->data->question055) ? $data->data->question055 : 0;
        $this->reporterProportion["male"] = $this->reporterProportion["male"] + (int) isset($data->data->question056) ? $data->data->question056 : 0;
        $this->reporterProportion["trans"] = $this->reporterProportion["trans"] + (int) isset($data->data->question057) ? $data->data->question057 : 0;
        $this->reporterProportion["unknown"] = $this->reporterProportion["unknown"] + (int) isset($data->data->question058) ? $data->data->question058 : 0;
    }


    private function presenterProportion($data){
        $this->presenterProportion["total"] = $this->presenterProportion["total"] + (int) isset($data->data->question059) ? $data->data->question059 : 0;
        $this->presenterProportion["female"] = $this->presenterProportion["female"] + (int) isset($data->data->question060) ? $data->data->question060 : 0;
        $this->presenterProportion["male"] = $this->presenterProportion["male"] + (int) isset($data->data->question061) ? $data->data->question061 : 0;
        $this->presenterProportion["trans"] = $this->presenterProportion["trans"] + (int) isset($data->data->question062) ? $data->data->question062 : 0;
        $this->presenterProportion["unknown"] = $this->presenterProportion["unknown"] + (int) isset($data->data->question063) ? $data->data->question063 : 0;
    }


}
