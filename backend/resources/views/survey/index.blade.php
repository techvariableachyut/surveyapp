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
    <link type="text/css" rel="stylesheet" href="/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="/css/jquery-confirm.min.css">

</head>

<body>
    <div class="online_status"></div>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">IMS Survey Tool</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" id="snrBtn">Save and Continue Later</a></li>
                <li><a href="#" id="syncBtn">Sync Survey Data <span id="syncCount" class="badge"></span></a></li>
            </ul>
        </div>
    </nav>
    <div id="surveyElement"></div>
    <!-- <button class="save_resume" id="snrBtn">Save and Continue Later</button> -->
   

    <!-- Offline msg  div-->

    <!--  -->
    <!-- Save and Resume Modal -->
    <div id="snrModal" class="modal ">
        <!-- Modal content -->
        
        <div class="modal-content animated bounceIn">
            <div class="loader hide"> 

            </div>
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


    <script type="text/javascript">
        window.__token__ = "{{ Session::token() }}";
        window.__page__ = "survey"
    </script>
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap-notify.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/survey.app.js"></script>
    <script src="/js/config.js"></script>
    <script src="/js/survey.js"></script>
    <script src="/js/scripts.js"></script>
    <script src="/js/jquery-confirm.min.js"></script>
    <script src="/js/select2.min.js"></script>
    <link href="/css/select2.min.css" rel="stylesheet"/>
    <script src="/js/surveyjs-widgets.js"></script>

</body>
</html>