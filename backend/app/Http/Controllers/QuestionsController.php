<?php

namespace App\Http\Controllers;

use App\Sections;
use App\Questions;
use App\Dropdownvalues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $newquestion = array();

        $q = Questions::find("page1");
        $questions = json_decode($q->json);

        foreach ($questions->pages as $index => $question) {
            // foreach ($question[0] as  $value) {
                $newquestion[] = $question;
            // }   
                  
        }

        return response()->json(['response' => $newquestion, 'all' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $param = uniqid();
        return redirect()->route('create.questions', ['id' => $param]);
    }

    public function make()
    {
        return view('editor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $key = $_GET['accessKey'];
        // $json = json_decode($request->input('Json'));

        // if (!$json->title) {
        //     return response()->json(['error' => "Title not set."]);
        // }
        // $token = base64_encode($json->title);

        // $question = Questions::find($token);
        // if ($question == null) {
        //     // dd($json);
        //     $newjson = Questions::create([
        //         'token' => $token,
        //         'title' => $json->title,
        //         'json' => $request->input('Json')
        //     ]);
        // }else{
        //     $newjson = Questions::where('token',$token)->update([
        //         'json' => $request->input('Json')
        //     ]);
        // }



        return response()->json(['json' => $key ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSurvey(Request $request){
        // $token = $_GET['surveyId'];
        $token = 'About';
        $newjson = Questions::find($token);
        $c = '[{"name":"page1","elements":[{"type":"matrix","name":"Quality","title":"Please indicate if you agree or disagree with the following statements","columns":[{"value":1,"text":"Strongly Disagree"},{"value":2,"text":"Disagree"},{"value":3,"text":"Neutral"},{"value":4,"text":"Agree"},{"value":5,"text":"Strongly Agree"}],"rows":[{"value":"affordable","text":"Product is affordable"},{"value":"does what it claims","text":"Product does what it claims"},{"value":"better then others","text":"Product is better than other products on the market"},{"value":"easy to use","text":"Product is easy to use"}]},{"type":"rating","name":"satisfaction","title":"How satisfied are you with the Product?","minRateDescription":"Not Satisfied","maxRateDescription":"Completely satisfied"},{"type":"rating","name":"recommend friends","visible":false,"visibleIf":"{satisfaction} > 3","title":"How likely are you to recommend the Product to a friend or co-worker?","minRateDescription":"Will not recommend","maxRateDescription":"I will recommend"},{"type":"comment","name":"suggestions","title":"What would make you more satisfied with the Product?"}]},{"name":"page2","elements":[{"type":"radiogroup","name":"price to competitors","title":"Compared to our competitors, do you feel the Product is","choices":["Less expensive","Priced about the same","More expensive","Not sure"]},{"type":"radiogroup","name":"price","title":"Do you feel our current price is merited by our product?","choices":[{"value":"correct","text":"Yes, the price is about right"},{"value":"low","text":"No, the price is too low for your product"},{"value":"high","text":"No, the price is too high for your product"}]},{"type":"multipletext","name":"pricelimit","title":"What is the... ","items":[{"name":"mostamount","title":"Most amount you would every pay for a product like ours"},{"name":"leastamount","title":"The least amount you would feel comfortable paying"}]}]},{"name":"page3","elements":[{"type":"text","name":"email","title":"Thank you for taking our survey. Your survey is almost complete, please enter your email address in the box below if you wish to participate in our drawing, then press the  button."}]}]';
        return response()->json(['pages' => json_decode($c)]);
        // return response()->json($_GET['start']);
        
    }


    public function vieweditpage(){
        return view('questions.view');
    }
}
