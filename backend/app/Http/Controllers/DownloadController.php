<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Questions;
use Illuminate\Http\Request;

class DownloadController extends Controller
{   
    public function download(Request $request,$surveyId,$token){
        $answers = Answers::where('token',$token)->get();
        $question = Questions::where('token',$surveyId)->first();


        $questionarray = array();
        $answersarray = array();
        $questionnames = array();

        foreach (json_decode($question->json) as $questions) {
            foreach ($questions->elements as $e) {
                foreach ($e as $index => $questiontitle) {
                    if ($index == "title") {
                        $questionarray[] = $questiontitle;
                    }

                    if ($index == "label") {
                        $questionarray[] = $questiontitle;
                    }

                    if($index == "name"){
                        $questionnames[] = $questiontitle;
                    }
                }
            }
        }


        foreach (json_decode($answers) as $index => $ans) {
            //$answersarray[] = $ans;

            foreach ($ans as $key => $value) {
                if ($key == "answer") {
                    //$answersarray[] = $value;
                    foreach (json_decode($value) as $i => $answer) {
                        if ($i == "data") {
                            $temp = array();
                            foreach ($questionnames as $qnames) {
                                $iftrue = false;
                                foreach ($answer as $aindex => $realanswer) {
                                    if($qnames == $aindex){
                                        $iftrue = true;
                                        if (is_array($realanswer)) {
                                            $temp[] = $realanswer[0];
                                        }else{
                                            $temp[] = $realanswer;
                                        }

                                        break;
                                    }
                                }

                                if($iftrue !== true){
                                    $temp[] = "User did not answer";
                                }
                            }
                            $answersarray[] = implode(",",$temp);
                        }
                    }
                }
            }
        }
        
        $file = fopen('php://memory', 'w');
        $uniqueid = uniqid();
        
        $finalarray = array(implode(",",$questionarray));
        
        foreach ($answersarray as $value) {
            $finalarray[] = $value;
        }

        $localfile = fopen(public_path() . "/csv/$uniqueid" . ".csv", 'w');
        fwrite($localfile, json_encode($finalarray));

        // dd($finalarray);
        foreach($finalarray as $line){
            fputcsv($file,explode(',',$line)); 
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

    public function downloadall(Request $request,$surveyId){
        $answers = Answers::where('surveyId',$surveyId)->get();
        $question = Questions::where('token',$surveyId)->first();

        $questionarray = array();
        $answersarray = array();
        $questionnames = array();

        foreach (json_decode($question->json) as $questions) {
            foreach ($questions->elements as $e) {
                foreach ($e as $index => $questiontitle) {
                    if ($index == "title") {
                        $questionarray[] = $questiontitle;
                    }

                    if ($index == "label") {
                        $questionarray[] = $questiontitle;
                    }

                    if($index == "name"){
                        $questionnames[] = $questiontitle;
                    }
                }
            }
        }


        foreach (json_decode($answers) as $index => $ans) {
            //$answersarray[] = $ans;

            foreach ($ans as $key => $value) {
                if ($key == "answer") {
                    //$answersarray[] = $value;
                    foreach (json_decode($value) as $i => $answer) {
                        if ($i == "data") {
                            $temp = array();
                            foreach ($questionnames as $qnames) {
                                $iftrue = false;
                                foreach ($answer as $aindex => $realanswer) {
                                    if($qnames == $aindex){
                                        $iftrue = true;
                                        if (is_array($realanswer)) {
                                            $temp[] = $realanswer[0];
                                        }else{
                                            $temp[] = $realanswer;
                                        }

                                        break;
                                    }
                                }

                                if($iftrue !== true){
                                    $temp[] = "User did not answer";
                                }
                            }
                            $answersarray[] = implode(",",$temp);
                        }
                    }
                }
            }
        }

        $file = fopen('php://memory', 'w');
        $uniqueid = uniqid();
        
        $finalarray = array(implode(",",$questionarray));

        foreach ($answersarray as $value) {
            $finalarray[] = $value;
        }

        //dd($finalarray);

        $localfile = fopen(public_path() . "/csv/$uniqueid" . ".csv", 'w');
        fwrite($localfile, json_encode($finalarray));

        // dd($finalarray);
        foreach($finalarray as $line){
            fputcsv($file,explode(',',$line)); 
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
