<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministrativeController extends Controller
{
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

// /administrative/responses/submitted

    public function responsesSubmitted(){
        $db = DB::table('answers')->count();
        return response()->json(['response' => $db]);
    }

// /administrative/responses/saved

    public function responsesSaved(){
        $db = DB::table('answers')->where('done',"Completed")->count();
        return response()->json(['saved' => $db]);
    }

// /administrative/responses/reviewed

    public function responsesReviewed(){
        $db = DB::table('answers')->where('done',"Reviewed")->count();
        return response()->json(['reviewed' => $db]);
    }

// /administrative/responses/monitor

    public function responsesSubmittedMonitor(){
        $db = DB::table('answers_')->whereIn('answer',['Monitor 1','Monitor 2','Monitor 3','Monitor 4','Monitor 5','Monitor 6','Monitor 7','Monitor 8','Monitor 9','Monitor 10'])->get();


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
        
        return response()->json([
            "1" => $this->monitor1,
            "2" => $this->monitor2,
            "3" => $this->monitor3,
            "4" => $this->monitor4,
            "5" => $this->monitor5,
            "6" => $this->monitor6,
            "7" => $this->monitor7,
            "8" => $this->monitor8,
            "9" => $this->monitor9,
            "10" => $this->monitor10
        ]);
    }

// /administrative/sources/gender

    public function genderSources(){
        $female = 0;
        $male = 0;
        $trans = 0;

        $db = DB::table('questions_')->where('surveyId',"5adb93c6e8c82")->whereIn('name',["question022","question023","question024"])->get();

        $getanswer = DB::table('answers_')->where('surveyId',"5adb93c6e8c82")->whereIn('name',[$db[0]->name,$db[1]->name,$db[2]->name, ])->get();

        foreach ($getanswer as $index => $gender) {
            if ($gender->name == "question022") {
                $female = $female + $gender->answer;
            }


            if ($gender->name == "question023") {
                $male = $male + $gender->answer;
            }


            if ($gender->name == "question024") {
                $trans = $trans + $gender->answer;
            }
        }

        return response()->json([
            'female' => $female,
            'male' => $male,
            'trans' => $trans
        ]);
    }

// /administrative/reporter/gender/proportion

    public function reporterGenderProportion(){
        $female = 0;
        $male = 0;
        $trans = 0;

        $db = DB::table('questions_')->where('surveyId',"5adb93c6e8c82")->whereIn('name',["question055","question056","question057"])->get();

        $getanswer = DB::table('answers_')->where('surveyId',"5adb93c6e8c82")->whereIn('name',[$db[0]->name,$db[1]->name,$db[2]->name, ])->get();

        foreach ($getanswer as $index => $gender) {
            if ($gender->name == "question055") {
                $female = $female + $gender->answer;
            }


            if ($gender->name == "question056") {
                $male = $male + $gender->answer;
            }


            if ($gender->name == "question057") {
                $trans = $trans + $gender->answer;
            }
        }    

        return response()->json([
            'female' => $female,
            'male' => $male,
            'trans' => $trans
        ]);    
    }

// /administrative/presenter/gender/proportion

    public function presenterGenderProportion(){

        $female = 0;
        $male = 0;
        $trans = 0;

        $db = DB::table('questions_')->where('surveyId',"5adb93c6e8c82")->whereIn('name',["question060","question061","question062"])->get();

        $getanswer = DB::table('answers_')->where('surveyId',"5adb93c6e8c82")->whereIn('name',[$db[0]->name,$db[1]->name,$db[2]->name, ])->get();

        foreach ($getanswer as $index => $gender) {
            if ($gender->name == "question060") {
                $female = $female + $gender->answer;
            }


            if ($gender->name == "question061") {
                $male = $male + $gender->answer;
            }


            if ($gender->name == "question062") {
                $trans = $trans + $gender->answer;
            }
        } 

        return response()->json([
            'female' => $female,
            'male' => $male,
            'trans' => $trans
        ]);   
    }

// /administrative/image/gender/proportion

    public function imageGenderProportion(){
        $female = 0;
        $male = 0;
        $total = 0;

        $db = DB::table('questions_')->where('surveyId',"5adb93c6e8c82")->whereIn('name',["question62","question63","question071"])->get();

        $getanswer = DB::table('answers_')->where('surveyId',"5adb93c6e8c82")->whereIn('name',[$db[0]->name,$db[1]->name,$db[2]->name])->get();

        foreach ($getanswer as $index => $gender) {
            if ($gender->name == "question62") {
                $female = $female + $gender->answer;
            }


            if ($gender->name == "question63") {
                $male = $male + $gender->answer;
            }


            if ($gender->name == "question071") {
                $total = $total + $gender->answer;
            }
        } 

        return response()->json([
            'female' => $female,
            'male' => $male,
            'trans' => $total - ($female + $male)
        ]);   
    }

// "/administrative/gender/stereotype/challenge"

    public function genderStereotypeChallenge(){
        $challenges = 0;
        $reinforces = 0;

        $db = DB::table('questions_')->where('name',"question067")->get();

        $getanswer = DB::table('answers_')->where('surveyId',"5adb93c6e8c82")->whereIn('name',[$db[0]->name])->get();
        
        foreach ($getanswer as $index => $gender) {
            if ($gender->answer == "Challenges stereotypes") {
                $challenges = $challenges + 1;
            }


            if ($gender->answer == "Reinforces stereotypes") {
                $reinforces =  $reinforces + 1;
            }
        } 

        return response()->json([
            'challenges' => $challenges,
            'reinforces' => $reinforces
        ]);   
    }

}
