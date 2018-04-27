@extends('layouts.app')
@section('content')

<div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/survey/all">All Survey</a>
                </li>
                <li class="breadcrumb-item"><a href="/survey/answer/{{$question->token}}">Survey - {{$question->title}}</a>
                </li>

                <li class="breadcrumb-item"><a href="/survey/answer/user/{{$answer->surveyId}}/{{$answer->token}}">Survey Response Id - {{$answer->token}} </a>
                </li>
              </ol>
        </div>

      <div class="content-wrapper">
        <div  class="content-header row"><h1 id="title"></h1></div>
        <div class="content-body">
            <div class="online_status"></div>
            <div id="surveyElement"></div>
        </div>
      </div>
@endsection

@section('script')
    <link type="text/css" rel="stylesheet" href="/css/jquery-ui.css" />

    <link type="text/css" rel="stylesheet" href="/css/survey.css" />
    <script>
        window.__question__ = <?= $question ?>;
        window.__answer__ = <?= $answer ?>;
        window.__token__ = "{{Session::token()}}";
    </script>

    <script src="/js/jquery.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/survey.app.admin.js"></script>
    <script src="/js/surveyjs-widgets.js"></script>
    <script src="/js/config.js"></script>
    <script src="/js/survey_admin.js"></script>

@endsection



