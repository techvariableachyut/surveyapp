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
                        $this->questionarray[$e->name] = $e->title;
                    }
                    
                    if($e->type == 'paneldynamic'){
                        foreach ($e->templateElements as $val ) {
                            $this->questionarray[$val->name] = $val->title;
                        }
                    }
                    if($e->type == 'multipletext'){
                        foreach ($e->items as  $val) {
                            $this->questionarray[$val->name] = $val->title;
                        }
                    }

                }

            }
            
        }
    }


    private function renderAnswer($answers){
        $count = 0;
        foreach ($answers as $answer) {
            $temp = array();
            $json = json_decode($answer->answer);
            $questionAnswer = $json->data;

            foreach ($questionAnswer as $index => $eachQA) {
                if ($index !== "section" ) {
                    if (is_array($eachQA)) {
                        $string = "";
                        $i = 0;
                        foreach ($eachQA as $loopindex => $loopvalue) {
                            if($index !== "question16"){
                                foreach ($loopvalue as $stringindex => $stringvalue) {
                                    if($this->questionarray[$stringindex]){
                                        if($stringvalue == "other"){

                                        }
                                        $string = $string . "\r\n" . $this->questionarray[$stringindex] . " :- " . $stringvalue;
                                    }else {
                                        $q = explode("-",$stringindex);
                                    }
                                }
                            }

                            if(++$i != $loopindex ) {
                                $string = $string . "\r\n" . "---------------------------------------------------------------------------------------------------";
                            }

                        }
                        $temp[$index] = $string;
                    }else{
                        $temp[$index] = $eachQA;
                    }
                }
            }

            $this->answersarray[] = $temp;
        }
    }


    private function sequenceQuestionAnswer(){
        $questions = $this->questionarray;
        $answers = $this->answersarray;

        
        foreach ($answers as $aIndex => $a) {
            $temp = array();
            foreach ($questions as $qIndex =>  $q) {
                $iftrue = false;
                $val = "";
                foreach ($a as $arrayindex => $answer) {
                    if($qIndex == $arrayindex){
                        $iftrue = true;
                        $val = $answer;
                    }
                }

                if($iftrue == true){
                    $temp[] = $val;
                }else{
                    $temp[] = "no response";
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
        $file = fopen('php://memory', 'w');
        // if(!is_dir(public_path() . "/csv")){
        //     mkdir(public_path() . "/csv", 0777);
        // }
        // $uniqueid = uniqid();
        // $localfile = fopen(public_path() . "/csv/$uniqueid" . ".csv", 'w');
        // fwrite($localfile, json_encode($finalarray));
        foreach($finalarray as $line){
            fputcsv($file,explode('#',$line)); 
        }
        
        // reset the file pointer to the start of the file
        fseek($file, 0);
        // tell the browser it's going to be a csv file
        header('Content-Type: application/csv');
        // tell the browser we want to save it instead of displaying it
        header('Content-Disposition: attachment; filename="csvfile.csv";');
        // make php send the generated csv lines to the browser
        fpassthru($file);
        fclose($localfile); 
    }

}