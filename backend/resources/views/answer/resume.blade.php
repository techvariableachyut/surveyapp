<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Survey - Gender in News Monitoring Tool</title>

    <link rel="apple-touch-icon" sizes="60x60" href="/app-assets/images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/app-assets/images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/app-assets/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/app-assets/images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="/app-assets/images/ico/favicon-32.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="/css/jquery-ui.css" />
    <link type="text/css" rel="stylesheet" href="/css/survey.css" />
    <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="/css/custom.css" >
</head>

<body>
    <div class="online_status"></div>
    <div id="surveyElement"></div>
    <button class="save_resume" id="snrBtn">Save and Continue Later</button>

    <!-- Save and Resume Modal -->
    <div id="snrModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 class="modal_title">Save and Continue Later</h2>
            <i>Please supply an email address to save your progress. A unique link will be emailed to you that will allow you to return where you left off.</i>
            <form  id="saveLater" action="">
                <div class="modal_input_group">
                <label class="modal_input_label" for="name">Email</label> 
                <input  class="modal_input" type="email" name="" id="emailID">
                </div>
                <div class="modal_input_group">
                    <label class="modal_input_label" for="email">Verify Email</label> 
                    <input class="modal_input" type="email" name="" id="emailIDCnf">
                </div>
                <div class="modal_input_group">
                    <button type="submit"  class="modal_btn">Save</button>
                </div>
            </form>

        </div>
    </div>


    <!-- Survey Completed Modal -->
    <div id="scmModal" class="modal thanks">
        <!-- Modal content -->
        <div class="modal-content">
            <h3 class="modal_title success">Thank you for completing the survey!</h3>
            <div id="scmClose" class="modal_input_group close">
                <button class="close modal_btn">Close</button>
            </div>
        </div>
    </div>


    <!-- Confirm Modal -->
    <div id="cnfModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <h2 class="modal_title">Are You Sure?</h2>
                <div class="modal_input_group cnf">
                    <button id="modal_btn_confirm" class="modal_btn cnf">Yes</button>
                    <button id="modal_btn_cancel" class="modal_btn cnf">Cancel</button>
                </div>
            </div>
    </div>

    <!-- Online Status  Modal -->
    <div id="onlineStatusModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <i style="color:red;">You don't have Internet connectivity, Please try after sometimes.</i>
                <div class="modal_input_group">
                    <button id="online_status_btn" class="modal_btn">Close</button>
                </div>
            </div>
    </div>

    <script>
        window.__question__ = <?= $question ?>;
        window.__answer__ = <?= $answer ?>;
    </script>
    <script src="/js/jquery.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/survey.app.resume.js"></script>
    <script src="/js/surveyjs-widgets.js"></script>
    <!-- <script src="/js/homepage.js"></script>
    <script src="/js/questions.js"></script> -->
    <script src="/js/config.js"></script>
    <script src="/js/survey.resume.js"></script>
    <script src="/js/scripts.js"></script>


</body>
</html>