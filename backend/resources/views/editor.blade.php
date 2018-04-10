<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>SurveyJS Editor</title>
    {{ csrf_field() }}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/ace.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/worker-json.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/mode-json.js" type="text/javascript" charset="utf-8"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.1/knockout-debug.js"></script>
    <script src="https://unpkg.com/survey-knockout"></script>
    <link rel="stylesheet" href="https://unpkg.com/survey-knockout/survey.css" />

    <script src="https://unpkg.com/surveyjs-editor"></script>
    <link rel="stylesheet" href="https://unpkg.com/surveyjs-editor/surveyeditor.css" />
    <link rel="stylesheet" href="/css/index.css" />
</head>

<body>
    <div class="survey-page-header">
        <div class="sv_main survey-page-header-content">
            <button onclick="window.location = '/'">&lt&nbspBack</button>
            @if(Auth::guest())
            <a href="/login" class="btn btn-success btn-sm">Login</a>
            @else
                {{ Auth::user()->name }}
            @endif
        </div>
    </div>
    <div class="sv_main sv_frame sv_default_css">
        <div class="sv_custom_header">
        </div>
        <div class="sv_container">
            <div class="sv_header">
                <h3>
                    <span id="sjs_editor_title_edit" class="editor_title_edit" style="display: none;">
                        <input style="border-top: none; border-left: none; border-right: none; outline: none;" />
                        <span class="btn btn-success" onclick="postEdit()" style="border-radius: 2px; margin-top: -8px; background-color: #1ab394; border-color: #1ab394;">Update</span>
                        <span class="btn btn-warning" onclick="cancelEdit()" style="border-radius: 2px; margin-top: -8px;">Cancel</span>
                    </span>
                    <span id="sjs_editor_title_show">
                        <span style="padding-top: 1px; height: 39px; display: inline-block;"></span>
                        <span class="edit-survey-name" onclick="startEdit()" title="Change Name">
                            <img class="edit-icon" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgMjQgMjQiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDI0IDI0IiB4bWw6c3BhY2U9InByZXNlcnZlIj48Zz48cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZmlsbD0iIzFBQjM5NCIgZD0iTTE5LDRsLTksOWw0LDRsOS05TDE5LDR6Ii8+PHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGZpbGw9IiMxQUIzOTQiIGQ9Ik04LDE1djRoNEw4LDE1eiIvPjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBmaWxsPSIjMUFCMzk0IiBkPSJNMSwxN3YyaDR2LTJIMXoiLz48L2c+PC9zdmc+"
                                style="width:24px; height:24px; margin-top: -5px;" />
                        </span>
                    </span>
                </h3>
            </div>
            <div class="sv_body">
                <div id="editor"></div>
            </div>
        </div>
    </div>

    <script src="/js/editor.js"></script>
</body>

</html>