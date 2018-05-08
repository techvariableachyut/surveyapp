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
                    message: 'You are Offline Now!',
                    icon: 'fa fa-sad',
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

        
        var condition = navigator.onLine ? "online" : "offline";
        if(condition == "offline"){
            $('.online_status').addClass('offline' )
            $('.sv_progress_bar').addClass('offline')
            $('.save_resume').addClass('offline')
        }

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
                icon: 'fa fa-sad',
                message: "You are Offline Now, Try After Sometimes!",
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
                        title: 'Save & Continue Later',
                        message: `We have sent you an email at ${$('#emailID').val()}, with a link to continue the survey from where you left.` 
                    },{
                        type: 'pastel-info',
                        delay: 10000,
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<span data-notify="title">{1}</span>' +
                            '<span data-notify="message">{2}</span>' +
                        '</div>'
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
                message: "You are Offline Now, Try After Sometimes!",
                icon: 'fa fa-sad',
            },{
                type: 'danger'
            });
        }else{
            if(localStorage.getItem(AllOfflineSurveyDataStorage)){
                if(JSON.parse(localStorage.getItem(AllOfflineSurveyDataStorage)).length){
                    $.confirm({
                        title: 'Confirm!',
                        content: `At present, there are ${JSON.parse(localStorage.getItem(AllOfflineSurveyDataStorage)).length}  stored offline submitted survey. Do you want to sync them to the server?`,
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
                                            $.post( "/answers/grouped/create", 
                                            { 
                                                _token:__token__,  
                                                data: localStorage.getItem('AllOfflineSurveyDataStorage')
                                            })
                                            .done(_=>{

                                                setTimeout(function() {
                                                    notify.update({'type': 'success', 'message': '<strong>Success</strong> Your survey has been saved!', 'progress': 100 });
                                                }, 4000);

                                                localStorage
                                                    .setItem( AllOfflineSurveyDataStorage ,JSON.stringify([]));
                                                $('#syncCount').html(0)
                                            })
                                            .fail(_=>{

                                                setTimeout(function() {
                                                    notify.update({'type': 'danger', 'message': '<strong>Sorry</strong>Something Went Wrong! ', 'progress': 100 });
                                                }, 4000);

                                            })
                                        },
                                        cancel: function () {
                                            //
                                        }
                                    }
                                });
                            },
                            cancel: function () {
                               //
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

