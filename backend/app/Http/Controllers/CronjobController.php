<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CronjobController extends Controller
{   

    private $questions = array();
    private $answers = array();

    public function save(){
        $allSurveys = Questions::all();
        $allSurveyAnswers = Answers::all();
        
        $this->renderSurveyQuestions($allSurveys);
        $this->renderEachSurveyAnswer($allSurveyAnswers);
        
        $this->answersInsert();
        $this->questionsInsert();
        dd(array('questions' => $this->questions, 'answers' => $this->answers));
    }

    private function renderSurveyQuestions($allSurveys){
        foreach ($allSurveys as $survey) {
            foreach (json_decode($survey->json) as $questions) {
                foreach ($questions->elements as $elements) {
                    $this->groupQuestionsInArray($elements,$survey->token);   
                }
            }
        }
    }

    private function renderEachSurveyAnswer($allSurveyAnswers){
        foreach ($allSurveyAnswers as $answers) {
            foreach (json_decode($answers->answer) as $answerindex => $answer) {
                if ($answerindex == "data") {
                    $this->groupAnswersInArray($answer,$answers->surveyId,$answers->token);
                }
            }
        }
    }

    private function groupQuestionsInArray($questions, $token){
        if(preg_match("/question/",$questions->name)){
            $this->questions[] = array('name' => $questions->name,'title' => $questions->title,'surveyId' => $token);
        }

        if($questions->type == 'paneldynamic'){
            foreach ($questions->templateElements as $val) {
                $this->questions[] = array('name' => $val->name,'title' => $val->title,'surveyId' => $token);
            }
        }
                    
        if($questions->type == 'multipletext'){
            foreach ($questions->items as  $val) {
                $this->questions[] = array('name' => $val->name,'title' => $val->title,'surveyId' => $token);
            }
        }
    }

    private function groupAnswersInArray($answers, $id,$token){
        foreach ($answers as $key => $value) {
            if(is_array($value)){
                $this->answers[] = array('name' => $key, 'answer'=> json_encode($value[0]), 'surveyId' => $id, 'token' => $token);
            }else{
                $this->answers[] = array('name' => $key,'answer' => $value,'surveyId' => $id,'token' => $token);                
            }
        }
    }

    private function answersInsert(){
        DB::table('answers_')->insert($this->answers);
    }

    private function questionsInsert(){
        DB::table('questions_')->insert($this->questions);
    }

}
