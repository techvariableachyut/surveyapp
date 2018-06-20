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
    public $tackingCode = 'question995';
    
    public function getanswers($id){
        if (!Auth::user()) {
            return redirect('/login');
        }
        $ans = Answers::where('surveyId',$id)->where('done','Completed')->simplePaginate(10);  
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
        $question = Questions::where('token',$id)->first();
        return view('answer.reviewed',compact('answers','question','ans'));
    }
}
