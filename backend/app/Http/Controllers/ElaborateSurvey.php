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
    private $incomplete = 0;
    private $monitors = ["Monitor 1" => 0,"Monitor 2" => 0,"Monitor 3" => 0,"Monitor 4" => 0,"Monitor 5" => 0,"Monitor 6" => 0,"Monitor 7" => 0,"Monitor 8" => 0,"Monitor 9" => 0,"Monitor 10" => 0];
    private $genderSources = [ "Female" => 0,"Male" => 0, "Transgender" => 0];
    private $imageSources = ["Female" => 0,"Male" => 0, "Transgender" => 0];
    private $reporterProportion = ["Total" => 0,"Female" => 0,"Male" => 0,"Transgender" => 0, "Unknown" => 0];
    private $presenterProportion = ["Total" => 0,"Female" => 0,"Male" => 0,"Transgender" => 0, "Unknown" => 0];
    private $genderAware = ['yes' => 0,'no'=> 0];
    private $furtherAnalysis = ['yes' => 0,'no'=> 0];
    private $questionsSet = array(
        "monitor"=> "question991",
        "newsSource"=> array (
            "Female"=> "question022",
            "Male"=>"question023",
            "Transgender"=>"question024",
        ),
        "image"=> array(
            "Totalperson"=>"question071",
            "Female"=>"question59",
            "Male"=>"question60",
        ),
        "genderanalysis"=>array(
            "genderaware"=>"question066",
            "furtheranalysis"=> "question070"
        ),
       "reporter"=> array(
           "Total"=>"question054",
           "Female"=>"question055",
           "Male"=>"question056",
           "Transgender"=>"question057",
           "Unknown"=>"question058"
       ),
       "presenter"=> array(
           "Total"=>"question059",
           "Female"=>"question060",
           "Male"=>"question061",
           "Transgender"=>"question062",
           "Unknown"=>"question063"
       ),    
    );

    public function elaborate($surveyId){
        $answers = Answers::where('surveyId',$surveyId)->get();
        $this->total = count($answers);
        $survey = DB::table('questions')->where('token',$surveyId)->first();
        $surveyTitle = $survey->title;
        $this->completed($answers);
        $this->reviewed($answers);
        $this->incomplete($answers);
        $this->monitor($answers);
        $totalResponse = count($answers); 
        $completed = $this->completed;
        $incomplete = $this->incomplete;
        $reviewed = $this->reviewed; 
        $monitors = $this->monitors; 
        $genderSources = $this->genderSources; 
        $imageSources = $this->imageSources; 
        $reporterProportion = $this->reporterProportion; 
        $presenterProportion = $this->presenterProportion;
        $genderAware = $this->genderAware;
        $furtherAnalysis = $this->furtherAnalysis;


        return view("elaborate.index",compact(
            'surveyId',
            'totalResponse',
            'surveyTitle',
            'completed',
            'reviewed',
            'incomplete',
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

    private function incomplete($answers){
        foreach ($answers as $answer) {
            if ($answer->done == "Incomplete") {
                $this->incomplete = $this->incomplete + 1;
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
        $this->genderSources["Female"] = $this->genderSources["Female"] +  ( isset($data->data->question022) ? (int) $data->data->question022 : 0 );
        $this->genderSources["Male"] = $this->genderSources["Male"] +  (isset($data->data->question023) ? (int) $data->data->question023 : 0);
        $this->genderSources["Transgender"] = $this->genderSources["Transgender"] +  (isset($data->data->question024) ? (int) $data->data->question024 : 0);   
    }

    private function proportionImage($data){
        
        $this->imageSources["Female"] = $this->imageSources["Female"] + ( isset($data->data->question59) ? (int) $data->data->question59 : 0 );
        $this->imageSources["Male"] = $this->imageSources["Male"] + isset($data->data->question60) ? (int) $data->data->question60 : 0;
        $this->imageSources["Transgender"] = isset($data->data->question071) ? (int) $data->data->question071 : 0 - ($this->imageSources["Female"] + $this->imageSources["Male"]);
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
        $this->reporterProportion["Total"] = $this->reporterProportion["Total"] +  (isset($data->data->question054) ? (int) $data->data->question054 : 0);
        $this->reporterProportion["Female"] = $this->reporterProportion["Female"] +  (isset($data->data->question055) ? (int) $data->data->question055 : 0);
        $this->reporterProportion["Male"] = $this->reporterProportion["Male"] +  (isset($data->data->question056) ? (int)  $data->data->question056 : 0);
        $this->reporterProportion["Transgender"] = $this->reporterProportion["Transgender"] +  (isset($data->data->question057) ? (int) $data->data->question057 : 0);
        $this->reporterProportion["Unknown"] = $this->reporterProportion["Unknown"] + ( isset($data->data->question058) ? (int) $data->data->question058 : 0);
    }


    private function presenterProportion($data){
        $this->presenterProportion["Total"] = $this->presenterProportion["Total"] +  (isset($data->data->question059) ? (int) $data->data->question059 : 0);
        $this->presenterProportion["Female"] = $this->presenterProportion["Female"] +  (isset($data->data->question060) ? (int) $data->data->question060 : 0);
        $this->presenterProportion["Male"] = $this->presenterProportion["Male"] +  (isset($data->data->question061) ? (int) $data->data->question061 : 0);
        $this->presenterProportion["Transgender"] = $this->presenterProportion["Transgender"] +  (isset($data->data->question062) ? (int) $data->data->question062 : 0);
        $this->presenterProportion["Unknown"] = $this->presenterProportion["Unknown"] +  (isset($data->data->question063) ? (int) $data->data->question063 : 0);
    }

    // public function createCsv($surveyId){
    //     $this->elaborate($surveyId);
    //     $array = [$this->total,$this->monitors,$this->completed,$this->reviewed,$this->genderSources,$this->imageSources,$this->genderAware,$this->furtherAnalysis,$this->reporterProportion,$this->presenterProportion];
    //     $get = $this->render($array);

    //     $question = 
    //     [
    //         "Total number of responses submitted
    //         # Number of responses submitted by each monitor
    //         # Total number of responses saved 
    //         # Total number of responses reviewed
    //         # Sources by gender - proportion of Female, male, trans of total sources
    //         # People in images – proportion of Female, male, trans of total people in images
    //         # Stories that are gender aware – proportion of total number of stories
    //         # Number of stories for further analysis
    //         # Reporters by gender - Female, male, trans proportion of total reporters
    //         # Presenters by gender - Female, male, trans proportion of total presenters 
    //         ",
    //         "$get"
    //     ];

    //     $this->downloadfile($question);
    // }


    // private function downloadfile($finalarray){
    //     $file = fopen('php://memory', 'w');

    //     if(!is_dir(public_path() . "/csv")){
    //         mkdir(public_path() . "/csv", 0777);
    //     }

    //     $uniqueid = uniqid();

    //     $localfile = fopen(public_path() . "/csv/$uniqueid" . ".csv", 'w');
    //     fwrite($localfile, json_encode($finalarray));
        
    //     foreach($finalarray as $line){
    //         fputcsv($file,explode('#',$line)); 
    //     }
        
    //     // reset the file pointer to the start of the file
    //     fseek($file, 0);
    //     // tell the browser it's going to be a csv file
    //     header('Content-Type: application/csv');
    //     // tell the browser we want to save it instead of displaying it
    //     header('Content-Disposition: attachment; filename="csvfile.csv";');
    //     // make php send the generated csv lines to the browser
    //     fpassthru($file);
    //     fclose($localfile); 
    // }

    // private function render($data){
    //     $allarray = array();

    //     foreach ($data as $dindex => $dvalue) {
    //         if(is_array($dvalue)){
    //             $array = array();
    //             foreach ($dvalue as $key => $value) {
    //                 $array[$key] = "$key" . " : " .  "$value"; 
    //             }   

    //             $allarray[] = implode("\r\n", $array);
    //         }else{
    //             $allarray[] = $dvalue;
    //         }
    //     }

    //     return implode("#", $allarray);
    // }
}
