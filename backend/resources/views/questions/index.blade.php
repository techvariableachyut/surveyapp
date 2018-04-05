<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>survey.js Editor Test </title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.0/knockout-debug.js"></script>
    <script src="https://unpkg.com/survey-knockout"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/ace.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/worker-json.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/mode-json.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/ext-language_tools.js" type="text/javascript" charset="utf-8"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script src="../package/surveyeditor.js"></script>
    <link rel="stylesheet" href="../package/surveyeditor.css" />

    <link rel="stylesheet" href="https://unpkg.com/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./index.css">


    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet"
    />

    <script src="https://unpkg.com/sortablejs@1.7.0/Sortable.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/image-picker/0.3.0/image-picker.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/image-picker/0.3.0/image-picker.css" />

    <script src="https://unpkg.com/nouislider@9.2.0"></script>
    <script src="https://unpkg.com/wnumb@1.1.0"></script>
    <link href="https://unpkg.com/nouislider@9.2.0/distribute/nouislider.min.css" rel="stylesheet" />

    <script src="https://unpkg.com/signature_pad@2.2.0/dist/signature_pad.min.js"></script>

    <script src="https://rawgit.com/RobinHerbots/Inputmask/4.x/dist/jquery.inputmask.bundle.js"></script>
    <script src="https://rawgit.com/RobinHerbots/Inputmask/4.x/dist/inputmask/phone-codes/phone.js"></script>

    <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

    <script src="https://unpkg.com/icheck@1.0.2"></script>
    <link rel="stylesheet" href="https://unpkg.com/icheck@1.0.2/skins/square/blue.css">


    <script src="https://unpkg.com/jquery-bar-rating"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- Themes -->
    <link rel="stylesheet" href="https://unpkg.com/jquery-bar-rating@1.2.2/dist/themes/bars-1to10.css" />
    <link rel="stylesheet" href="https://unpkg.com/jquery-bar-rating@1.2.2/dist/themes/bars-movie.css" />
    <link rel="stylesheet" href="https://unpkg.com/jquery-bar-rating@1.2.2/dist/themes/bars-square.css" />
    <link rel="stylesheet" href="https://unpkg.com/jquery-bar-rating@1.2.2/dist/themes/bars-pill.css" />
    <link rel="stylesheet" href="https://unpkg.com/jquery-bar-rating@1.2.2/dist/themes/bars-reversed.css" />
    <link rel="stylesheet" href="https://unpkg.com/jquery-bar-rating@1.2.2/dist/themes/bars-horizontal.css" />
    <link rel="stylesheet" href="https://unpkg.com/jquery-bar-rating@1.2.2/dist/themes/fontawesome-stars.css" />
    <link rel="stylesheet" href="https://unpkg.com/jquery-bar-rating@1.2.2/dist/themes/css-stars.css" />
    <link rel="stylesheet" href="https://unpkg.com/jquery-bar-rating@1.2.2/dist/themes/bootstrap-stars.css" />
    <link rel="stylesheet" href="https://unpkg.com/jquery-bar-rating@1.2.2/dist/themes/fontawesome-stars-o.css" />

    <script src="https://unpkg.com/surveyjs-widgets"></script>
</head>

<body>
    <div id="manage" data-bind="template: 'surveys-manage'"></div>
    <div id="editorElement"></div>
    <script type="text/javascript">
        if (!window["%hammerhead%"]) {
            Survey.Survey.cssType = "bootstrap";
            Survey.defaultBootstrapCss.navigationButton = "btn btn-green";
            //Hide json tab and allow to drop only three questions
            var editorOptions = {
                questionTypes: ["text", "radiogroup", "dropdown"],
                showJSONEditorTab: false
            };
            var editor = new SurveyEditor.SurveyEditor("editorElement", editorOptions);
        }
    </script>
</body>

</html>