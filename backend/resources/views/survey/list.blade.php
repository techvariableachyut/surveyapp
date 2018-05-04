@extends('layouts.app')
@section('content')

<div class="row">
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
                                                {{ $question->title }}
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
        </div>
@endsection


