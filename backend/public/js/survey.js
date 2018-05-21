function app(survey,Survey,storageName){
    
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
        //Set the loaded data into the survey.
        if (res.currentPageNo >= 0 ) 
            survey.currentPageNo = res.currentPageNo;
        if (res.data) 
            survey.data = res.data;

        console.log(res.currentPageNo);
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
        console.log(options.name);
        
        if (options.name == 'question020') {        
            parseInt( s.data.question020 ) !==0 &&  parseInt( s.data.question020 ) != parseInt(s.data.question022) + parseInt(s.data.question023) + parseInt(s.data.question024) + parseInt(s.data.question025) ? 
                options.error = " Total Number of News Source Not Match! " : options.error = null;
        }

        if (options.name == 'question054') {
            parseInt( s.data.question054 ) !==0 &&  parseInt(s.data.question054) != parseInt(s.data.question055) + parseInt(s.data.question056) + parseInt(s.data.question057) + parseInt(s.data.question058) ? 
                options.error = " Total Number of Reporter Not Match!  " : options.error = null;
        }

        if (options.name == 'question059') {
            parseInt( s.data.question059 ) !==0 && parseInt(s.data.question059) != parseInt(s.data.question060) + parseInt(s.data.question061) + parseInt(s.data.question062)  + parseInt(s.data.question063) ? 
                options.error = " Total Number of Anchor Not Match!  " : options.error = null;
        }

        if (options.name == 'question059') {
            parseInt( s.data.question059 ) !==0 && parseInt(s.data.question059) != parseInt(s.data.question060) + parseInt(s.data.question061) + parseInt(s.data.question062)  + parseInt(s.data.question063) ? 
                options.error = " Total Number of Anchor Not Match!  " : options.error = null;
        }

        if (options.name == 'question2') {
            parseInt( s.data.question020 ) != s.data.question2.length  ? options.error = "Please fill data for each source" : options.error = null;
        }
        
        if(options.name == 'question5'){       
            parseInt( s.data.question071 ) != s.data.question5.length  ? options.error = "Please fill data for each source" : options.error = null;
        }

        if(options.name == 'question3'){       
            parseInt( s.data.question072 ) != s.data.question3.length  ? options.error = "Please fill data for each source" : options.error = null;
        }
        
        if(options.name == 'question4'){       
            parseInt( s.data.question073 ) != s.data.question4.length  ? options.error = "Please fill data for each source" : options.error = null;
        }
        
        if(options.name == 'question14'){       
            parseInt( s.data.question1 ) != s.data.question14.length  ? options.error = "Please fill data for each source" : options.error = null;
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
    var json = null;
    var surveyId = window.location.pathname.split('/');
    var storageName = surveyId[2];
    jQuery
    .get("/getSurvey?surveyId="+surveyId[2], function(data) {
        json = data;
        window.survey = new Survey.Model(json);
        app(window.survey,Survey,storageName)
    })
    
})()
  