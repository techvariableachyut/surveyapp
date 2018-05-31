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
    private $answerCounts;
    public $surveyTitle;
    public $completed = 0;
    public $reviewed = 0;
    public function elaborate($surveyId){
        $survey = DB::table('questions')->where('token',$surveyId)->first();
        $surveyTitle = $survey->title;
        $answers = DB::table('answers')->where('surveyId',$surveyId)->get();
        foreach ($answers as $key => $value) {
            $arr[] = json_decode($value->answer);  
        }
        foreach ($arr as $key => $value) {
            $monitor[] = $value->data->question991;
        }   
        $surveyResponseInfo = $this->countall($surveyId);
        return view('elaborate.index',compact('surveyTitle','surveyResponseInfo'));
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
        return array(
            "completed"=> $this->completed,
            "reviewed"=> $this->reviewed,
            "count"=> $this->count
        );
        
    }

}
