<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Questions;
use Illuminate\Http\Request;
// use NestedJsonFlattener\Flattener\Flattener;

class DownloadController extends Controller
{   

    private $questionnames = array();
    private $questionarray = array();
    private $answersarray = array();
    private $extractedAnswersarray = array();

    public function download(Request $request,$surveyId,$token){
           
        /**
        * Get survey with given token
        * Get Answers of the given token 
        */           
        $answer = Answers::where('token',$token)->get();
        $question = Questions::where('token',$surveyId)->first();

        /**
        * Render questions and answer
        */ 

        $this->renderQuestion($question);
        $this->renderAnswer($answer);
        
        /**
        * Sequence questions and answer
        */ 

        $this->sequenceQuestionAnswer();
        
        $finalarray = array(implode("#",$this->questionarray));
        foreach ($this->extractedAnswersarray as $value) {
            $finalarray[] = $value;
        }

        $this->downloadfile($finalarray);
    }

    private function renderQuestion($question){
        foreach (json_decode($question->json) as $questions) {
            foreach ($questions->elements as $e) {
                if(preg_match("/question/",$e->name)){
                    if(!$e->title){

                    }else{
                        $this->questionarray[$e->name] =  isset( $e->title) ?  $e->title : $e->name;
                    }
                    if($e->type == 'paneldynamic'){
                        foreach ($e->templateElements as $val ) {
                            $this->questionarray[$val->name] = isset( $val->title) ?  $val->title : $val->name;
                        }
                    }
                    if($e->type == 'multipletext'){
                        foreach ($e->items as  $val) {
                            $this->questionarray[$val->name] = isset( $val->title) ?  $val->title : $val->name;
                        }
                    }
                }
            } 
        }
        // dd($this->questionarray);
    }

    private function renderAnswer($answers){
        $count = 0;
        foreach ($answers as $answer) {
            $temp = array();
            $list = array();
            $totalList = array();
            $json = json_decode($answer->answer);
            $questionAnswer = $json->data;
            foreach ($questionAnswer as $index => $eachQA) {
                if ($index !== "section" ) {
                        if (is_array($eachQA)) {
                            if(!preg_match("/tag/",$index)){
                                $i = 0;
                                foreach ($eachQA as $loopindex => $loopvalue) {
                                    $i ++;
                                    foreach ($loopvalue as $stringindex => $stringvalue) { 
                                        if(preg_match("/\bComment\b/",$stringindex)){
                                            $hasother = explode("-",$stringindex);
                                            $list[$i][$hasother[0]] =  $stringvalue;
                                        }else{
                                            $list[$i][$index] = $i;
                                            $list[$i][$stringindex] =$stringvalue ; 
                                        } 
                                    }
                                }
                            }else{
                                if(preg_match("/\bComment\b/",$index)){
                                    $hasother = explode("-",$index);
                                    $temp[$hasother[0]] =  $stringvalue;
                                }else{
                                    $temp[$index] = implode(", ",$eachQA); 
                                }     
                            }
                        }else{
                            if(preg_match("/\bComment\b/",$index)){
                                $hasother = explode("-",$index);
                                $temp[$hasother[0]] =  $stringvalue;
                            }else{
                                $temp[$index] = $eachQA;
                            }  
                        }     
                }
            }
            if (!empty($list)) {
                foreach ($list as $key => $value) {
                    // dd($list);
                    $totalList = array_merge($temp,$value);
                    $this->answersarray[] = $totalList;
                } 
           }else{
                $this->answersarray[] = $temp;
           }

        }
        // dd($this->answersarray);
    }

    private function sequenceQuestionAnswer(){
        $questions = $this->questionarray;
        $answers = $this->answersarray;
        $maxount = 0;
        foreach ($answers as $aIndex => $answer) {
            $temp = array();
            foreach ($questions as $qIndex => $question) {
                if (array_key_exists($qIndex ,$answer)){
                    if(!is_array($answer[$qIndex])){
                        $temp[] = $answer[$qIndex];    
                    }else{
                        $temp[] = implode(",",$answer[$qIndex]);
                    }
                }else{
                    $temp[] = '';
                }
            }
            $this->extractedAnswersarray[] = implode("#",$temp);
        }
    }

    public function downloadall(Request $request,$surveyId){
        $answers = Answers::where('surveyId',$surveyId)->get();
        $question = Questions::where('token',$surveyId)->first();
        $this->renderQuestion($question);
        $this->renderAnswer($answers);
        $this->sequenceQuestionAnswer();
        $finalarray = array(implode("#",$this->questionarray));
        foreach ($this->extractedAnswersarray as $value) {
            $finalarray[] = $value;
        }
        $this->downloadfile($finalarray);     
    }

    private function downloadfile($finalarray){

        // if(!is_dir(public_path() . "/csv")){
        //    mkdir(public_path() . "/csv", 0777);
        // }
        // $uniqueid = uniqid();
        // $localfile = fopen(public_path() . "/csv/$uniqueid" . ".csv", 'w');
        // fwrite($localfile, json_encode($finalarray));
        // fclose($localfile); 

        $file = fopen('php://memory', 'w');
        foreach($finalarray as $line){
            fputcsv($file,explode('#',$line)); 
        }
        fseek($file, 0);
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="csvfile.csv";');
        fpassthru($file);
    }

}