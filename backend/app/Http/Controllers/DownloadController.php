<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Questions;
use Illuminate\Http\Request;

class DownloadController extends Controller
{   

    private $questionnames = array();
    private $questionarray = array();
    private $answersarray = array();

    public function download(Request $request,$surveyId,$token){
        $answers = Answers::where('token',$token)->get();
        $question = Questions::where('token',$surveyId)->first();

        $this->renderQuestion($question);
        $this->renderAnswer($answers);
        
        $finalarray = array(implode("#",$this->questionarray));
        
        foreach ($this->answersarray as $value) {
            $finalarray[] = $value;
        }
        $this->downloadfile($finalarray);
    }

    public function downloadall(Request $request,$surveyId){
        $answers = Answers::where('surveyId',$surveyId)->get();
        $question = Questions::where('token',$surveyId)->first();

        $this->renderQuestion($question);
        $this->renderAnswer($answers);

        $finalarray = array(implode("#",$this->questionarray));
        
        foreach ($this->answersarray as $value) {
            $finalarray[] = $value;
        }

        $this->downloadfile($finalarray);
    }

    private function renderQuestion($question){
        foreach (json_decode($question->json) as $questions) {
            foreach ($questions->elements as $e) {
                foreach ($e as $index => $questiontitle) {
                    if ($index == "title") {
                        $this->questionarray[] = $questiontitle;
                    }

                    if ($index == "label") {
                        $this->questionarray[] = $questiontitle;
                    }

                    if($index == "name"){
                        if (preg_match("/section/",$questiontitle)) {
                        }else{
                            $this->questionnames[] = $questiontitle;
                        }
                    }
                }
            }
        }
    }

    private function renderAnswer($a){
        //get the questions of survey
        $answers = json_decode($a);
        $questionnames = $this->questionnames;

        foreach (json_decode($answers[0]->answer) as $answersindex => $answer) {
            if ($answersindex == "data") {
                $temp = array();   
                foreach ($questionnames as $qnames) {
                    $iftrue = false;
                    foreach ($answer as $aindex => $realanswer) {
                        if($qnames == $aindex){
                            $iftrue = true;
                        }
                    }


                    if($iftrue == true){
                        if (is_array($realanswer)) {
                            $temp[] = $realanswer[0];
                        }else{
                            $temp[] = $realanswer;
                        }
                    }

                    if($iftrue !== true){
                        $temp[] = "User did not answer";
                    }

                }
                $this->answersarray[] = implode("#",$temp);
            }
        }

    }


    private function downloadfile($finalarray){
        $file = fopen('php://memory', 'w');

        if(!is_dir(public_path() . "/csv")){
            mkdir(public_path() . "/csv", 0777);
        }

        $uniqueid = uniqid();

        $localfile = fopen(public_path() . "/csv/$uniqueid" . ".csv", 'w');
        fwrite($localfile, json_encode($finalarray));
        
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
