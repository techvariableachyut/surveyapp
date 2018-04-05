<?php

namespace App\Http\Controllers;

use App\Sections;
use App\Questions;
use App\Dropdownvalues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Sections::all();
        return view('questions.index',compact('sections'));
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
        $section = Sections::find($request->input('section'));

        $str = $section->name;
        $split = explode(" ", $str);
        $last = $split[count($split)-1];

        $question = Questions::create([
            "section" => $request->input('section'),
            "title" => $request->input('title'),
            "type" => $request->input('type'),
            "ifForEach" => $request->input('ifForEach')
        ]);
        $question->update([
            'name' => $last . $question->id
        ]);
        $type = $request->input('type');
        if ($type == "Drop down") {
            $array = array();
            $mI = $request->input('dropdownvalues');
            foreach ($mI as $input) {
                $array[] = ['nameid' => $question->id, 'name' => $input];
            }

            DB::table('dropdownvalues')->insert($array);
        }
        return redirect()->back();
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
}
