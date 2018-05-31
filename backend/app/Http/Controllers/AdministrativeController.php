<?php

namespace App\Http\Controllers;

use App\Answers;
use Illuminate\Http\Request;

class AdministrativeController extends Controller
{

	private $completed;
	private $reviewed;
	private $monitor;
	private $monitors = ["Monitor 1" => 0,"Monitor 2" => 0,"Monitor 3" => 0,"Monitor 4" => 0,"Monitor 5" => 0,"Monitor 6" => 0,"Monitor 7" => 0,"Monitor 8" => 0,"Monitor 9" => 0,"Monitor 10" => 0];

	private $genderSources = ["male" => 0, "female" => 0, "trans" => 0];
	private $imageSources = ["male" => 0, "female" => 0, "trans" => 0];

    public function call(){
    	$answers = Answers::all();
    	$question = \App\Questions::first();

    	dd($question->json);

    	$this->completed($answers);
    	$this->reviewed($answers);
    	$this->monitor($answers);
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
    	$this->imageSources["trans"] = (int) $data->data->question1;
    }

}
