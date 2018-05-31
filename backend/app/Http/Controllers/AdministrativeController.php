<?php

namespace App\Http\Controllers;

use App\Answers;
use Illuminate\Http\Request;

class AdministrativeController extends Controller
{

	private $completed;
	private $reviewed;
	private $monitors = ["Monitor 1" => 0,"Monitor 2" => 0,"Monitor 3" => 0,"Monitor 4" => 0,"Monitor 5" => 0,"Monitor 6" => 0,"Monitor 7" => 0,"Monitor 8" => 0,"Monitor 9" => 0,"Monitor 10" => 0];
	private $genderSources = ["male" => 0, "female" => 0, "trans" => 0];
	private $imageSources = ["male" => 0, "female" => 0, "trans" => 0];
    private $reinforcesStereotype = 0;
    private $challengesStereotype = 0;
    private $reporterProportion = ["total" => 0, "male" => 0,"female" => 0,"trans" => 0];
    private $presenterProportion = ["total" => 0, "male" => 0,"female" => 0,"trans" => 0];


    public function call(){
    	$answers = Answers::all();
    	$question = \App\Questions::first();

    	$this->completed($answers);
    	$this->reviewed($answers);
    	$this->monitor($answers);

        //return view("elaborate.index")->with($this->completed,$this->reviewed,$this->monitors,$this->genderSources,$this->imageSources,$this->reinforcesStereotype,$this->challengesStereotype,$this->reporterProportion,$this->presenterProportion);
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
            $this->challengesStereotype($data);
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
    	$this->genderSources["female"] = $this->genderSources["female"] + (int) $data->data->question022;
    	$this->genderSources["male"] = $this->genderSources["male"] + (int) $data->data->question023;
    	$this->genderSources["trans"] = $this->genderSources["trans"] + (int) $data->data->question024;
    }

    private function proportionImage($data){
    	$this->imageSources["female"] = $this->imageSources["female"] + (int) $data->data->question13;
    	$this->imageSources["male"] = $this->imageSources["male"] + (int) $data->data->question12;
    	$this->imageSources["trans"] = (int) $data->data->question1 - $this->imageSources["female"] + $this->imageSources["male"];
    }

    private function challengesStereotype($data){
        if($data->data->question067 == "Challenges stereotypes"){
            $this->challengesStereotype = $this->challengesStereotype + 1;
        }

        if ($data->data->question067 == "Reinforces stereotypes") {
            $this->reinforcesStereotype = $this->reinforcesStereotype + 1;
        }
    }

    private function reporterProportion($data){
        $this->reporterProportion["total"] = $this->reporterProportion["total"] + (int) $data->data->question054;
        $this->reporterProportion["female"] = $this->reporterProportion["female"] + (int) $data->data->question055;
        $this->reporterProportion["male"] = $this->reporterProportion["male"] + (int) $data->data->question056;
        $this->reporterProportion["trans"] = $this->reporterProportion["trans"] + (int) $data->data->question057;
    }


    private function presenterProportion($data){
        $this->presenterProportion["total"] = $this->presenterProportion["total"] + (int) $data->data->question059;
        $this->presenterProportion["female"] = $this->presenterProportion["female"] + (int) $data->data->question060;
        $this->presenterProportion["male"] = $this->presenterProportion["male"] + (int) $data->data->question061;
        $this->presenterProportion["trans"] = $this->presenterProportion["trans"] + (int) $data->data->question062;
    }

}
