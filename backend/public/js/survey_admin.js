function app(survey,Survey){
    Survey
        .StylesManager
        .applyTheme("default");
  
    // The json variaable is available in question.js file 
    // Adding new locale into the library.
    //The json variaable is available in config.js file

    var mycustomSurveyStrings = adminConfig;
    Survey.surveyLocalization.locales["my"] = mycustomSurveyStrings;
    survey.locale = "my";

    function loadState(survey) {
        res = JSON.parse(__answer__.answer);
        //Set the loaded data into the survey.
        survey.currentPageNo = 0;
        survey.data = res.data;
       
    }

    //Load the initial state
    //For Non Optional section
    loadState(survey);
    $("#surveyElement").Survey({ model: survey });


}


(function(){
    var json = {
        pages: JSON.parse(__question__.json)
    }

    window.survey = new Survey.Model(json);
    app(window.survey,Survey)
    $('#title').html(__question__.title)
})()

  