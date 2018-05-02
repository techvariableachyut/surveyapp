(function() {
    // OFFLINE STORED DATA
    var AllOfflineSurveyDataStorage = 'AllOfflineSurveyDataStorage'
    /**
     * Online or offline status chacking
     */
    window.addEventListener('load', function() {
        function updateOnlineStatus(event) {
            var condition = navigator.onLine ? "online" : "offline";
            if(condition == "offline"){
                $('.online_status').addClass('offline' )
                $('.sv_progress_bar').addClass('offline')
                $('.save_resume').addClass('offline')

                $.notify({
                    message: 'You are Offline Now!'
                },{
                    type: 'danger'
                });

            }else{
                $('.online_status').removeClass('offline' ) 
                $('.sv_progress_bar').removeClass('offline')
                $('.save_resume').removeClass('offline')

                $.notify({
                    message: 'You are Online Now!'
                },{
                    type: 'success'
                });
            } 
        }
        window.addEventListener('online',  updateOnlineStatus);
        window.addEventListener('offline', updateOnlineStatus);
    })

    /**
     * Modal scripts
     */

    var snrmodal = document.getElementById('snrModal');
    var snrbtn = document.getElementById("snrBtn");
    var snrspan = document.getElementsByClassName("close")[0];
    snrbtn.onclick = function() {
        var condition = navigator.onLine ? "online" : "offline";
        if(condition == "offline"){
            $.notify({
                message: 'You are Offline Now, Try After Sometimes!'
            },{
                type: 'danger'
            });
        }else{
            snrmodal.style.display = "block";
        }  
    }
    snrspan.onclick = function() {
        snrmodal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == snrmodal) {
            snrmodal.style.display = "none";
        }
    }

    
    var saveLater = document.getElementById("saveLater");

    $( "#saveLater" ).submit(function( event ) { 
        event.preventDefault();
        var surveyId = window.location.pathname.split('/');
        if($('#emailID').val() == ''){
            $.notify({
                message: 'Empty email box! '
            },{
                type: 'warning'
            });
        }else{
            if($('#emailID').val() === $('#emailIDCnf').val()  ){
                $('.loader').removeClass('hide')
                $('.loader').addClass('show' )
                $.post( "/lazy/survey/submit", 
                { 
                _token:__token__,  
                surveyId: surveyId[2], 
                answer: {
                    currentPageNo: survey.currentPageNo,
                    data: survey.data,
                },
                email: $('#emailID').val()
                })
                .done(res => {
                    $('.loader').removeClass('show')
                    $('.loader').addClass('hide' )
                    snrmodal.style.display = "none"
                    $.notify({
                        message: `We have sent you an email at ${$('#emailID').val()}, with a link to continue the survey from where you left.` 
                    },{
                        type: 'success'
                    });
                    $('#emailID').val('');
                    $('#emailIDCnf').val(''); 
                })
                .fail(_ =>{ 
                    $('.loader').removeClass('show')
                    $('.loader').addClass('hide' )
                    snrmodal.style.display = "none" 
                    $.notify({
                        message: 'Something went wrong, please try after sometimes! '
                    },{
                        type: 'warning'
                    });
                })
            }else{
                $.notify({
                    message: 'The Confirmation Email must match your Email Address'
                },{
                    type: 'warning'
                });
                return null
            }
        }

    });

    // Preventing from reload
    // window.onbeforeunload = function() {
    //     return "";
    // }


    // data sync code
    $('#syncCount').html( localStorage.getItem(AllOfflineSurveyDataStorage) ?
        JSON.parse(localStorage.getItem(AllOfflineSurveyDataStorage)).length ? 
            JSON.parse(localStorage.getItem(AllOfflineSurveyDataStorage)).length  : 0  : 0 )

    $('#syncBtn').click(function() {
        var condition = navigator.onLine ? "online" : "offline";
        if(condition == "offline"){
            $.notify({
                message: 'You are Offline Now, Try After Sometimes!'
            },{
                type: 'danger'
            });
        }else{
            if(localStorage.getItem(AllOfflineSurveyDataStorage)){
                if(JSON.parse(localStorage.getItem(AllOfflineSurveyDataStorage)).length){
                    $.confirm({
                        title: 'Confirm!',
                        content: `You have 
                            ${JSON.parse(localStorage.getItem(AllOfflineSurveyDataStorage)).length} 
                            stored survey data, do you want to sync to server?
                            `,
                        theme: 'dark',
                        buttons: {
                            proceed: function () {
                                $.confirm({
                                    title: 'Confirm!',
                                    content: 'Are You Sure?',
                                    theme: 'dark',
                                    buttons: {
                                        yes: function () {
                                            var notify = $.notify('<strong>Saving...</strong> Do not close this page.', {
                                                allow_dismiss: false,
                                                showProgressbar: true
                                            });
                                            
                                            setTimeout(function() {
                                                notify.update({'type': 'success', 'message': '<strong>Success</strong> Your survey has been saved!', 'progress': 50 });
                                            }, 4000);
                                        },
                                        cancel: function () {
                                            $.alert('Canceled!');
                                        }
                                    }
                                });
                            },
                            cancel: function () {
                                $.alert('Canceled!');
                            }
                        }
                    });
                }else{
                    $.notify({
                        message: "At present, there is no data/responses to sync."
                    },{
                        type: 'warning'
                    });
                }
            }else{
                $.notify({
                    message: "At present, there is no data/responses to sync."
                },{
                    type: 'warning'
                });   
            }
        }  

    })
})()

