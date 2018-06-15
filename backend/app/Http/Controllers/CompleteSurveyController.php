<?php

namespace App\Http\Controllers;

use Auth;
use App\Sections;
use App\Questions;
use App\Answers;
use App\Dropdownvalues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompleteSurveyController extends Controller{
    
    public function getall(){
        $qanda = Questions::all();
        return view('qanda.qanda',compact('qanda'));
    }

    public function getanswers($id){
        if (!Auth::user()) {
            return redirect('/login');
        }
        $ans = Answers::where('surveyId',$id)->where('done','Completed')->simplePaginate(10);
        $obj = new \StdClass();
        $answers = new \StdClass();

        foreach ($ans as $aindex => $avalue) {
            foreach ($avalue as $key => $value) {
                $obj->$key = $value;
                $obj->attribute = $avalue;
                foreach (json_decode($avalue->answer) as $tokenindex => $token){
                    if ($tokenindex == "data") {
                        if(isset($token->question995)){
                            $obj->token = $token->question995;
                        }else{
                            $obj->token = "12345678s";
                        }
                    }
                }
            }
            $answers->$aindex = $obj;
        }

        $question = Questions::where('token',$id)->first();
        return view('answer.answers',compact('answers','question','ans'));
    }

    public function getanswersfromuser($surveyId,$token){
        if (!Auth::user()) {
            return redirect('/login');
        }
    	$question = Questions::where('token',$surveyId)->first();
    	$answer =  Answers::where('surveyId',$surveyId)->where('token',$token)->first();
    	return view('survey.userresult',compact('question','answer'));
    }

    public function getreviewed($id){
        if (!Auth::user()) {
            return redirect('/login');
        }
        $ans = Answers::where('surveyId',$id)->where('done','Reviewed')->simplePaginate(10);
        $obj = new \StdClass();
        $answers = new \StdClass();
        foreach ($ans as $aindex => $avalue) {
            foreach ($avalue as $key => $value) {
                $obj->$key = $value;
                $obj->attribute = $avalue;
                foreach (json_decode($avalue->answer) as $tokenindex => $token){
                    if ($tokenindex == "data") {
                        if(isset($token->question995)){
                            $obj->token = $token->question995;
                        }else{
                            $obj->token = "";
                        }
                    }
                }
            }
            $answers->$aindex = $obj;
        }
        $question = Questions::where('token',$id)->first();
        return view('answer.reviewed',compact('answers','question','ans'));
    }
}
