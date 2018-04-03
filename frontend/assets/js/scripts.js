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



    var scmmodal = document.getElementById('scmModal');
    var scmspan = document.getElementsByClassName("close")[1];
    var scmspan1 = document.getElementsByClassName("close")[2];
    scmspan.onclick = function() {
        scmmodal.style.display = "none";
        window.location.href = window.location.protocol+'//'+window.location.host
    }
    scmspan1.onclick = function() {
        scmmodal.style.display = "none";
        window.location.href = window.location.protocol+'//'+window.location.host
    }
    window.onclick = function(event) {
        if (event.target == scmmodal) {
            scmmodal.style.display = "none";
            window.location.href = window.location.protocol+'//'+window.location.host
        }
    }

    var onlineStatusModal = document.getElementById('onlineStatusModal')
    var online_status_btn = document.getElementById('online_status_btn')
    online_status_btn.onclick = function() {
        onlineStatusModal.style.display = "none";
    }

})()

