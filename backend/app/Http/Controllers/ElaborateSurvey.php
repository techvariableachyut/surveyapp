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
    private $count;
    private $monitor1;
    private $monitor2;
    private $monitor3;
    private $monitor4;
    private $monitor5;
    private $monitor6;
    private $monitor7;
    private $monitor8;
    private $monitor9;
    private $monitor10;
    private $completed = 0;
    private $reviewed = 0;
    private $challenges = 0;
    private $reinforces = 0;
    private $imageGenderFemale = 0;
    private $imageGenderMale = 0;
    private $imageGenderTrans = 0;
    private $genderSourcesFemale = 0;
    private $genderSourcesMale = 0;
    private $genderSourcesTrans = 0;
    private $presenterFemale = 0;
    private $presenterMale = 0;
    private $presenterTrans = 0;
    private $reporterFemale = 0;
    private $reporterMale = 0;
    private $reporterTrans = 0;

    public function elaborate($surveyId){
        $this->getMonitor($surveyId);
        $this->countall($surveyId);
        $this->genderStereotypeChallenge($surveyId);
        $this->imageGenderProportion($surveyId);
        $this->genderSources($surveyId);
        $this->presenterGenderProportion($surveyId);
        $this->reporterGenderProportion($surveyId);

        $one = $this->monitor1;
        $two = $this->monitor2;
        $three = $this->monitor3;
        $four = $this->monitor4;
        $five = $this->monitor5;
        $six = $this->monitor6;
        $seven = $this->monitor7;
        $eight = $this->monitor8;
        $nine = $this->monitor9;
        $ten = $this->monitor10;

        $reviewed = $this->reviewed;
        $completed = $this->completed;
        $count = $this->count;
        $challenges = $this->challenges;
        $reinforces = $this->reinforces;
        $imageGenderMale = $this->imageGenderMale;
        $imageGenderFemale = $this->imageGenderFemale;
        $imageGenderTrans = $this->imageGenderTrans;
        $genderSourcesFemale = $this->genderSourcesFemale;
        $genderSourcesMale = $this->genderSourcesMale;
        $genderSourcesTrans = $this->genderSourcesTrans;
        $presenterFemale = $this->presenterFemale;
        $presenterMale = $this->presenterMale;
        $presenterTrans = $this->presenterTrans;
        $reporterFemale = $this->reporterFemale;
        $reporterMale = $this->reporterMale;
        $reporterTrans = $this->reporterTrans;

        return view("elaborate.index",compact('one','two','three','four','five','six','seven','eight','nine','ten','reviewed','completed','count','challenges','reinforces','imageGenderFemale','imageGenderMale','imageGenderTrans','genderSourcesFemale','genderSourcesMale','genderSourcesTrans','presenterFemale','presenterMale','presenterTrans','reporterMale','reporterFemale','reporterTrans'));
    }

    private function countall($surveyId){
        $answers = DB::table('answers')->where('surveyId',$surveyId)->select('done')->get();
        $this->count = count($answers);

        foreach ($answers as $key => $value) {
            if ($value->done == "Completed") {
                $this->completed = $this->completed + 1;
            }

            if ($value->done == "Reviewed") {
                $this->reviewed = $this->reviewed + 1;
            }
        }
    }

    private function getMonitor($surveyId){

        $db = DB::table('answers_')->where('surveyId',$surveyId)->whereIn('answer',['Monitor 1','Monitor 2','Monitor 3','Monitor 4','Monitor 5','Monitor 6','Monitor 7','Monitor 8','Monitor 9','Monitor 10'])->get();

        foreach ($db as $answer) {
            if ($answer->answer == "Monitor 1") {
                $this->monitor1 = $this->monitor1 + 1;
            }
            if ($answer->answer == "Monitor 2") {
                $this->monitor2 = $this->monitor2 + 1;
            }
            if ($answer->answer == "Monitor 3") {
                $this->monitor3 = $this->monitor3 + 1;
            }
            if ($answer->answer == "Monitor 4") {
                $this->monitor4 = $this->monitor4 + 1;
            }
            if ($answer->answer == "Monitor 5") {
                $this->monitor5 = $this->monitor5 + 1;
            }
            if ($answer->answer == "Monitor 6") {
                $this->monitor6 = $this->monitor6 + 1;
            }
            if ($answer->answer == "Monitor 7") {
                $this->monitor7 = $this->monitor7 + 1;
            }
            if ($answer->answer == "Monitor 8") {
                $this->monitor8 = $this->monitor8 + 1;
            }
            if ($answer->answer == "Monitor 9") {
                $this->monitor9 = $this->monitor9 + 1;
            }
            if ($answer->answer == "Monitor 10") {
                $this->monitor10 = $this->monitor10 + 1;
            }
        }
    }

    public function genderStereotypeChallenge($surveyId){

        $getanswer = DB::table('answers_')->where('name',"question067")->where('surveyId',$surveyId)->get();
        
        foreach ($getanswer as $index => $gender) {
            if ($gender->answer == "Challenges stereotypes") {
                $this->challenges = $this->challenges + 1;
            }
            if ($gender->answer == "Reinforces stereotypes") {
                $this->reinforces =  $this->reinforces + 1;
            }
        } 
    }


    public function imageGenderProportion($surveyId){
        $getanswer = DB::table('answers_')->where('surveyId',$surveyId)->whereIn('name',["question62","question63","question071"])->get();

        foreach ($getanswer as $index => $gender) {
            if ($gender->name == "question62") {
                $this->imageGenderFemale = $this->imageGenderFemale + $gender->answer;
            }
            if ($gender->name == "question63") {
                $this->imageGenderMale = $this->imageGenderMale + $gender->answer;
            }
            if ($gender->name == "question071") {
                $this->imageGenderTrans = $this->imageGenderTrans + $gender->answer;
            }
        } 
    }

    private function genderSources($surveyId){

        $getanswer = DB::table('answers_')->where('surveyId',$surveyId)->whereIn('name',["question022","question023","question024"])->get();

        foreach ($getanswer as $index => $gender) {
            if ($gender->name == "question022") {
                $this->genderSourcesFemale = $this->genderSourcesFemale + $gender->answer;
            }


            if ($gender->name == "question023"){
                $this->genderSourcesMale = $this->genderSourcesMale + $gender->answer;
            }


            if ($gender->name == "question024") {
                $this->genderSourcesTrans = $this->genderSourcesTrans + $gender->answer;
            }
        }
    }

    public function presenterGenderProportion($surveyId){

        $getanswer = DB::table('answers_')->where('surveyId',$surveyId)->whereIn('name',["question060","question061","question062"])->get();

        foreach ($getanswer as $index => $gender) {
            if ($gender->name == "question060") {
                $this->presenterFemale = $this->presenterFemale + $gender->answer;
            }
            if ($gender->name == "question061") {
                $this->presenterMale = $this->presenterMale + $gender->answer;
            }
            if ($gender->name == "question062") {
                $this->presenterTrans = $this->presenterTrans + $gender->answer;
            }
        } 
    }


    public function reporterGenderProportion($surveyId){

        $getanswer = DB::table('answers_')->where('surveyId',$surveyId)->whereIn('name',["question055","question056","question057"])->get();

        foreach ($getanswer as $index => $gender) {
            if ($gender->name == "question055") {
                $this->reporterFemale = $this->reporterFemale + $gender->answer;
            }


            if ($gender->name == "question056") {
                $this->reporterMale = $this->reporterMale + $gender->answer;
            }


            if ($gender->name == "question057") {
                $this->reporterTrans = $this->reporterTrans + $gender->answer;
            }
        }      
    }
}
