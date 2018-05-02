<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answers;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uniqueid = uniqid();
        $id = $request['surveyId'];

        $uniqueid = uniqid();
        $answer = Answers::create([
            'surveyId' => $id,
            'token' => $uniqueid,
            'done' => 1,
            'answer' => json_encode($request['answer'])
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {
        $surveyId = $request['surveyId'];
        $tokenId = $request['tokenId'];
        Answers::where([             
                'surveyId' => $surveyId,
                'token' => $tokenId
        ])->update(['answer' => json_encode($request['answer']) ]);
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

    public function resumecompleteupdate(Request $request){
        $surveyId = $request['surveyId'];
        $tokenId = $request['tokenId'];
        Answers::where([             
                'surveyId' => $surveyId,
                'token' => $tokenId
        ])->update(['answer' => json_encode($request['answer']), 'done' => 1 ]);
    }

    public function storeMany(){
        $array = json_decode('[{"surveyId":"5adb93c6e8c82","currentPageNo":7,"data":{"section":["Section_Images"],"question2":"Monitor 2","question3":"Chin","question4":"8 Days","question5":"43c424","question6":"item2","question7":"item3","question8":"item4","question9":"item1","question10":"item2","question11":"item2","question39":"05/01/2018","question13":"7","question14":"item3","question15":"2","question16":"02:42","question17":"15:24","question18":"item2","question19":"3242`2c424c4","news_topics":"Science","question40":"Other (please specify)*"}},{"surveyId":"5ae8b6ac9fac0","currentPageNo":3,"data":{"question1":"fsfsadfdasf","question2":"item2","question3":"sdfsaf"}},{"surveyId":"5ae8b6ac9fac0","currentPageNo":3,"data":{"question1":"sfsdfsa","question2":"item2","question3":"dsf","question4":"dsafa","question5":"dfdsafsf"}},{"surveyId":"5ae8b6ac9fac0","currentPageNo":3,"data":{"question1":"dsfsf","question2":"item3"}},{"surveyId":"5ae8b6ac9fac0","currentPageNo":3,"data":{"question1":"esadfdsf","question2":"item2"}}]');

        foreach ($array as $key => $value) {
            
        }
    }
}
