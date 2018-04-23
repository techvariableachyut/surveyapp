<?php
Route::get('/', function () {
	if (!Auth::user()) {
        return redirect('/login');
    }
    return redirect('/dashboard');
});
Auth::routes();
Route::get('/survey/get/questions/{id}', 'SurveyController@questions');
Route::get('/monitoring-tool/{surveyToken}', 'SurveyController@survey');
Route::get('/resume-survey/{surveyId}/{surveyToken}', 'SurveyController@resume');
Route::get('/create/question', function () {
	if (Auth::guest()) {
		return view('auth.login');
	}
  return view('editor');
});
Route::get('/create/question', 'QuestionsController@create');
Route::get('/create/questions/{surveyId?}/{name?}', 'QuestionsController@make')->name('create.questions');
Route::post('/changeJson', 'QuestionsController@store')->name('questions');
Route::post('/changeSurveyName', 'QuestionsController@changeSurveyName');
Route::resource('questions', 'QuestionsController');
Route::resource('dashboard', 'SurveyController');
Route::post('/lazy/survey/submit', 'LazyController@emailandstore');
Route::get('/survey/answer/store', function(){
	return response()->json(['response' => true]);
});
Route::get('/getSurvey', 'QuestionsController@getSurvey');
Route::get('/survey/edit', 'QuestionsController@getSurvey');
Route::resource('answer', 'AnswerController');
Route::post('answer/submit', 'AnswerController@store')->name('answer.submit');
Route::post('answer/update', 'AnswerController@update')->name('answer.update');
Route::get('/survey/results', "CompleteSurveyController@getall");
Route::get('/survey/answer/{id}', "CompleteSurveyController@getanswers");
Route::get('/survey/answer/user/{surveyid}/{token}', "CompleteSurveyController@getanswersfromuser");
Route::post('/survey/copy/{id}', "CopyController@copy");
Route::get('/survey/delete/{id}', "QuestionsController@destroy");
Route::get('/survey/all', "SurveyController@show");


