function app(survey,Survey){
    var storageName = "SurveyJS_LoadState";
    Survey
        .StylesManager
        .applyTheme("orange");
  
    // The json variaable is available in question.js file
    //Adding new locale into the library.
    //The json variaable is available in config.js file

    var mycustomSurveyStrings = config;
    Survey.surveyLocalization.locales["my"] = mycustomSurveyStrings;
    survey.locale = "my";

    function loadState(survey) {
        if(JSON.parse(__answer__.answer)){
            survey.data = JSON.parse(__answer__.answer).data;
            survey.currentPageNo = JSON.parse(__answer__.answer).currentPageNo;
        }else{
            var storageSt = localStorage.getItem(storageName) || "";
            var res = {};
            if (storageSt){
                res = JSON.parse(storageSt); 
            }else {
                res = {
                    currentPageNo: 0,
                    data: {}
                };
            }
            if (res.currentPageNo >= 0 ) 
                survey.currentPageNo = res.currentPageNo;
            if (res.data) 
                survey.data = res.data;
        }
        window.location.hash = "section" + (survey.currentPageNo + 1);
    }

    //Load the initial state
    //For Non Optional section
    loadState(survey);
    function saveState(survey) {
        var res = {
            currentPageNo: survey.currentPageNo,
            data: survey.data
        };
        //Here should be the code to save the data into your database
        localStorage
            .setItem(storageName, JSON.stringify(res));
    }
    
    survey
        .onCurrentPageChanged
        .add(function (survey, options) {
            saveState(survey);
            console.log('changed');
            window.location.hash = "section" + (survey.currentPageNo + 1);
        });
  
    survey
        .onComplete
        .add(function (survey, options) {
            if(survey.isCompleted){
                saveState({
                    currentPageNo: 0,
                    data: null
                })
            }else{
                saveState(survey)
            }

        });
    
  
    function gotoPageByHash(hash) {
        if(!hash || hash.indexOf("#section") != 0) return;
        hash = hash.replace("#section", "");
        var index = Number.parseInt(hash);
        if(index > 0) {
            index -- ;
            survey.currentPageNo = index;
        }
    }
  
    gotoPageByHash(window.location.hash);
    window.onhashchange = function () {
        gotoPageByHash(window.location.hash);
    } 
  
    /**
     *  Custom Validation start
     */
    /**
     * 
     * News Sources custom  validation 
     */
    function surveyValidateQuestion(s, options) {
        if (options.name == 'price01') {
            s.data.price01 != s.data.price02 + s.data.price03 + s.data.price04 ? 
                options.error = "Error" : options.error = null;
        }
    }
    /**
     *  Custom Validation End
     */

    //Load the initial state
    //For Optional section
    loadState(survey);
    $("#surveyElement").Survey({ model: survey, onValidateQuestion: surveyValidateQuestion });

}


(function(){
    var json = {
        title: __question__.title,
        pages: JSON.parse(__question__.json)
    }
    window.survey = new Survey.Model(json);
    app(window.survey,Survey)
})()
  