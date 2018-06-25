@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="pink"><?= count($questions) ?></h3>
                            <span>Total Survey</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="teal"><?= count($answers) ?></h3>
                            <span>Total Responses</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-user1 teal font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="deep-orange">{{ $completed }}</h3>
                            <span>Completed</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-diagram deep-orange font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="cyan">{{ $reviewed }}</h3>
                            <span>Reviewed</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-ios-help-outline cyan font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ stats -->
<!--/ project charts -->
<div class="row">
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-body">
                <ul class="list-inline text-xs-center pt-2 m-0">
                    <li class="mr-1">
                        <h6><i class="icon-circle warning"></i> <span class="grey darken-1">Remaining</span></h6>
                    </li>
                    <li class="mr-1">
                        <h6><i class="icon-circle success"></i> <span class="grey darken-1">Completed</span></h6>
                    </li>
                </ul>
                <div class="chartjs height-250">
                    <canvas id="line-stacked-area" height="250"></canvas>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-xs-3 text-xs-center">
                        <span class="text-muted">Total Surveys</span>
                        <h2 class="block font-weight-normal"><?= count($questions) ?></h2>
                        <progress class="progress progress-xs mt-2 progress-success" value="70" max="100"></progress>
                    </div>
                    <div class="col-xs-3 text-xs-center">
                        <span class="text-muted">Total Responses</span>
                        <h2 class="block font-weight-normal"><?= count($answers) ?></h2>
                        <progress class="progress progress-xs mt-2 progress-success" value="40" max="100"></progress>
                    </div>
                    <div class="col-xs-3 text-xs-center">
                        <span class="text-muted">Completed</span>
                        <h2 class="block font-weight-normal">{{ $completed }}</h2>
                        <progress class="progress progress-xs mt-2 progress-success" value="60" max="100"></progress>
                    </div>
                    <div class="col-xs-3 text-xs-center">
                        <span class="text-muted">Reviewed</span>
                        <h2 class="block font-weight-normal">{{ $reviewed }}</h2>
                        <progress class="progress progress-xs mt-2 progress-success" value="90" max="100"></progress>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card card-inverse bg-info">
            <div class="card-body">
                <div class="position-relative">
                    <div class="chart-title position-absolute mt-2 ml-2 white">
                        <h1 class="display-4">{{ floor(($reviewed/count($answers))*100) }}%</h1>
                        <span>Survey Reviewed</span>
                    </div>
                    <canvas id="emp-satisfaction" class="height-400 block"></canvas>
                    <div class="chart-stats position-absolute position-bottom-0 position-right-0 mb-2 mr-3 white">
                        <a href="/survey/all" class="btn bg-info bg-darken-3 mr-1 white">Statistics <i class="icon-stats-bars"></i></a> for all survey.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Surveys</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#Survey</th>
                                    <th>Survey title</th>
                                    <th>Actions</th>
                                    <th>Link</th>
                                    <th>Responses</th>
                                </tr>
                            </thead>
                            <tbody id="append">
                                @foreach($questions as $index => $question)
                                    <tr>
                                        <td class="text-truncate"><a href="#" id="indexid">{{ $index + 1 }}</a></td>
                                        <td class="text-truncate">
                                            @if(!$question->title)
                                                -
                                            @else
                                                <a href="{{ URL::asset("/survey/info/".$question->token)}}">{{ $question->title }}</a>
                                            @endif
                                        </td>
                                        <td class="text-truncate">
                                            <a href="/create/questions/{{$question->token}}/{{$question->title}}" class="btn btn-sm btn-warning">Edit</a> 
                                            <a onclick="deleteSurvey('{{$question->token}}')" href="#"  class="btn btn-sm btn-danger">Delete</a>
                                            <a href="#" onclick="event.preventDefault(); var id= '{{$question->token}}'; copy(id,'{{ $index + 2 }}','{{ Session::token() }}');" class="btn btn-sm btn-success">Make a Copy</a>
                                            <a href="/answers/csv/all/{{$question->token}}"  class="btn btn-sm btn-default">Download</a>
                                        </td>
                                        <td>
                                            <a target="_blank" href="/monitoring-tool/{{ $question->token }}" class="btn btn-sm btn-success">
                                                <i class="icon-android-share-alt"></i>
                                            </a>
                                        </td>
                                        <td><a href="/survey/answer/{{$question->token}}" class="btn btn-sm btn-default">Responses</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div style="padding: 5%;">
                            @if(count($questions) == 0)
                                No results for any kind of Survey found. <a href="/create/question" class="btn btn-sm btn-info">Create Survey</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection