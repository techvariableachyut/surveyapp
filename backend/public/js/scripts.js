(function() {
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
            }else{
                $('.online_status').removeClass('offline' ) 
                $('.sv_progress_bar').removeClass('offline')
                $('.save_resume').removeClass('offline')
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
        snrmodal.style.display = "block";
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
        if($('#emailID').val() === $('#emailIDCnf').val() ){
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
            .done(res =>  snrmodal.style.display = "none" )
            .fail(_ => snrmodal.style.display = "none" )
        }else{
            alert('Check your email!')
            return null
        }

    });


    var scmmodal = document.getElementById('scmModal');
    var scmspan = document.getElementsByClassName("close")[1];
    var scmspan1 = document.getElementsByClassName("close")[2];
    scmspan.onclick = function() {
        scmmodal.style.display = "none";
        window.location.href = window.location.protocol+'//'+window.location.host +  window.location.pathname
    }
    scmspan1.onclick = function() {
        scmmodal.style.display = "none";
        window.location.href = window.location.protocol+'//'+window.location.host +  window.location.pathname
    }
    window.onclick = function(event) {
        if (event.target == scmmodal) {
            scmmodal.style.display = "none";
            window.location.href = window.location.protocol+'//'+window.location.host + window.location.pathname
        }
    }

    var onlineStatusModal = document.getElementById('onlineStatusModal')
    var online_status_btn = document.getElementById('online_status_btn')
    online_status_btn.onclick = function() {
        onlineStatusModal.style.display = "none";
    }




})()

