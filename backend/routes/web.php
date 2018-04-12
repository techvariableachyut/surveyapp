<?php


Route::get('/', function () {
	if (!Auth::user()) {
        return redirect('/login');
    }
    return view('home');
});

// Route::resource('api', 'ApiController');

Auth::routes();
// Route::get('/surveys', 'SurveyController@survey');
// Route::get('/home', 'SurveyController@home');
Route::get('/survey/get/questions/{id}', 'SurveyController@questions');

Route::get('/monitoring-tool/{surveyToken}', 'SurveyController@survey');

Route::get('/create/question', function () {
	if (Auth::guest()) {
		return view('auth.login');
	}
    return view('editor');
});
Route::get('/create/question', 'QuestionsController@create');
Route::get('/create/questions/{surveyId?}', 'QuestionsController@make')->name('create.questions');


Route::post('/changeJson', 'QuestionsController@store')->name('questions');
Route::post('/changeSurveyName', 'QuestionsController@changeSurveyName');

Route::resource('questions', 'QuestionsController');
Route::resource('dashboard', 'SurveyController');

// Route::get('/lazy/survey/answer', function () {
// 	$order = \App\Answers::findOrFail(1);
// 	$questions = \App\Questions::findOrFail("QmxhIGJsYSBibGE=");
// 	Mail::to($order)->send(new SaveAndContinue($questions));
// });

Route::get('/lazy/survey/submit/{bl}/{bla}', 'LazyController@emailandstore');

Route::get('/survey/answer/store', function(){
	return response()->json(['response' => true]);
});

Route::get('/getSurvey', 'QuestionsController@getSurvey');
Route::get('/survey/edit', 'QuestionsController@getSurvey');

Route::resource('answer', 'AnswerController');
Route::post('answer/submit', 'AnswerController@store')->name('answer.submit');