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
        $answers = Answers::where('surveyId',$id)->get();
        $question = Questions::where('token',$id)->first();
        return view('answer.answers',compact('answers','question'));
    }

    public function getanswersfromuser($surveyId,$token){
    	$question = Questions::where('token',$surveyId)->first();
    	$answer =  Answers::where('surveyId',$surveyId)->where('token',$token)->first();

    	// dd($question.$answer);
    	return view('survey.userresult',compact('question','answer'));
    }
}
