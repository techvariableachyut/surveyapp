  if(survey.title === "Digital Gender and Media Monitoring Tool"){
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

    if(options.name == 'question071'){
        parseInt( s.data.question071 ) !==0 && parseInt(s.data.question071) != parseInt(s.data.question59) + parseInt(s.data.question60) ?
            options.error = " Total Number of Person (Woman + Man) Not Match!  " : options.error = null;
    }
}