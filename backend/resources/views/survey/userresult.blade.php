@extends('layouts.app')
@section('content')
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <div class="online_status"></div>
            <div id="surveyElement"></div>

        </div>
      </div>
    </div>
@endsection

    <script>
        window.__question__ = <?= $question ?>;
        window.__answer__ = <?= $answer ?>;
    </script>
    <script src="/js/jquery.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/survey.app.js"></script>
    <script src="/js/surveyjs-widgets.js"></script>
    <script src="/js/homepage.js"></script>
    <script src="/js/questions.js"></script>
    <script src="/js/config.js"></script>
    <script src="/js/survey_admin.js"></script>
    <!-- <script src="/js/scripts.js"></script> -->
  </body>
</html>

