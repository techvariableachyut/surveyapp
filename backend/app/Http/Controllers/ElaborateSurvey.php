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
    private $total;
    private $monitors = ["Monitor 1" => 0,"Monitor 2" => 0,"Monitor 3" => 0,"Monitor 4" => 0,"Monitor 5" => 0,"Monitor 6" => 0,"Monitor 7" => 0,"Monitor 8" => 0,"Monitor 9" => 0,"Monitor 10" => 0];
    private $genderAware = ['yes' => 0,'no'=>0];
    private $furtherAnalysis = ['yes' => 0,'no'=>0];
    private $genderSources = ["male" => 0, "female" => 0, "trans" => 0];
    private $imageSources = ["male" => 0, "female" => 0, "trans" => 0];
    private $reporterProportion = ["total" => 0, "male" => 0,"female" => 0,"trans" => 0, "unknown" => 0];
    private $presenterProportion = ["total" => 0, "male" => 0,"female" => 0,"trans" => 0, "unknown" => 0];


    public function elaborate($surveyId){
        $answers = Answers::where('surveyId',$surveyId)->get();
        $this->total = count($answers);
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
        $this->genderSources["female"] = $this->genderSources["female"] + (int) isset($data->data->question022) ? (int) $data->data->question022 : 0;
        $this->genderSources["male"] = $this->genderSources["male"] + (int) isset($data->data->question023) ? (int) $data->data->question023 : 0;
        $this->genderSources["trans"] = $this->genderSources["trans"] + (int) isset($data->data->question024) ? (int) $data->data->question024 : 0;   
    }

    private function proportionImage($data){
        $this->imageSources["female"] = $this->imageSources["female"] + isset($data->data->question59) ? (int) $data->data->question59 : 0;
        $this->imageSources["male"] = $this->imageSources["male"] + isset($data->data->question60) ? (int) $data->data->question60 : 0;
        $this->imageSources["trans"] = $data->data->question071 - ($this->imageSources["female"] + $this->imageSources["male"]);
    }

    private function genderAnalysis($data){
        if (isset($data->data->question066) && $data->data->question066 == "Yes") {
            $this->genderAware['yes'] = $this->genderAware['yes'] + 1;
        }
        if (isset($data->data->question066) && $data->data->question066 == "No") {
            $this->genderAware['no'] = $this->genderAware['no'] + 1;
        }

        if(isset($data->data->question070) && $data->data->question070 == "Yes"){
            $this->furtherAnalysis['yes'] = $this->furtherAnalysis['yes'] + 1;
        }

        if(isset($data->data->question070) && $data->data->question070 == "No"){
            $this->furtherAnalysis['no'] = $this->furtherAnalysis['no'] + 1;
        }
    }

    private function reporterProportion($data){
        $this->reporterProportion["total"] = $this->reporterProportion["total"] + (int) isset($data->data->question054) ? (int) $data->data->question054 : 0;
        $this->reporterProportion["female"] = $this->reporterProportion["female"] + (int) isset($data->data->question055) ? (int) $data->data->question055 : 0;
        $this->reporterProportion["male"] = $this->reporterProportion["male"] + (int) isset($data->data->question056) ? (int) $data->data->question056 : 0;
        $this->reporterProportion["trans"] = $this->reporterProportion["trans"] + (int) isset($data->data->question057) ? (int) $data->data->question057 : 0;
        $this->reporterProportion["unknown"] = $this->reporterProportion["unknown"] + (int) isset($data->data->question058) ? (int) $data->data->question058 : 0;
    }


    private function presenterProportion($data){
        $this->presenterProportion["total"] = $this->presenterProportion["total"] + (int) isset($data->data->question059) ? (int) $data->data->question059 : 0;
        $this->presenterProportion["female"] = $this->presenterProportion["female"] + (int) isset($data->data->question060) ? (int) $data->data->question060 : 0;
        $this->presenterProportion["male"] = $this->presenterProportion["male"] + (int) isset($data->data->question061) ? (int) $data->data->question061 : 0;
        $this->presenterProportion["trans"] = $this->presenterProportion["trans"] + (int) isset($data->data->question062) ? (int) $data->data->question062 : 0;
        $this->presenterProportion["unknown"] = $this->presenterProportion["unknown"] + (int) isset($data->data->question063) ? (int) $data->data->question063 : 0;
    }

    public function createCsv($surveyId){
        $this->elaborate($surveyId);
        $array = [$this->total,$this->monitors,$this->completed,$this->reviewed,$this->genderSources,$this->imageSources,$this->genderAware,$this->furtherAnalysis,$this->reporterProportion,$this->presenterProportion];
        $get = $this->render($array);

        $question = 
        ["Total number of responses submitted
        # Number of responses submitted by each monitor
        # Total number of responses saved 
        # Total number of responses reviewed
        # Sources by gender - proportion of female, male, trans of total sources
        # People in images – proportion of female, male, trans of total people in images
        # Stories that are gender aware – proportion of total number of stories
        # Number of stories for further analysis
        # Reporters by gender - female, male, trans proportion of total reporters
        # Presenters by gender - female, male, trans proportion of total presenters 
        ",
        "$get"
        ];

        $this->downloadfile($question);
    }


    private function downloadfile($finalarray){
        $file = fopen('php://memory', 'w');

        if(!is_dir(public_path() . "/csv")){
            mkdir(public_path() . "/csv", 0777);
        }

        $uniqueid = uniqid();

        $localfile = fopen(public_path() . "/csv/$uniqueid" . ".csv", 'w');
        fwrite($localfile, json_encode($finalarray));
        
        foreach($finalarray as $line){
            fputcsv($file,explode('#',$line)); 
        }
        
        // reset the file pointer to the start of the file
        fseek($file, 0);
        // tell the browser it's going to be a csv file
        header('Content-Type: application/csv');
        // tell the browser we want to save it instead of displaying it
        header('Content-Disposition: attachment; filename="csvfile.csv";');
        // make php send the generated csv lines to the browser
        fpassthru($file);
        fclose($localfile); 
    }

    private function render($data){
        $allarray = array();

        foreach ($data as $dindex => $dvalue) {
            if(is_array($dvalue)){
                $array = array();
                foreach ($dvalue as $key => $value) {
                    $array[$key] = "$key" . " : " .  "$value"; 
                }   

                $allarray[] = implode("\r\n", $array);
            }else{
                $allarray[] = $dvalue;
            }
        }

        return implode("#", $allarray);
    }
}
