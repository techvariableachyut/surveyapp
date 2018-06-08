@extends('layouts.app')

@section('content')
<div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/survey/all">All Survey</a>
                </li>
                <li class="breadcrumb-item"><a href="/survey/answer/{{$question->token}}">Survey - {{$question->title}}</a>
                </li>
              </ol>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="card-block">
                        <p>
                        {{$question->title}} 
                            <span class="float-xs-right">
                                <a href="/survey/reviewed/{{$question->token}}">All Reviewed Survey <i class="icon-arrow-right2"></i></a>
                            </span>
                        </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Status</th>
                                    <th>View Response</th>
                                    <th>Downlaod</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($answers as $index => $a)
                                  <tr>
                                      <td class="text-truncate"><a href="#">{{ $a->attribute->token }}</a></td>
                                      <td class="text-truncate">
                                          {{ $a->attribute->done }}
                                      </td>
                                      <td> <a href="/survey/answer/user/{{$a->attribute->surveyId}}/{{$a->attribute->token}}">View</a></td>
                                      <td><a href="/answer/create/csv/{{ $a->attribute->surveyId }}/{{ $a->attribute->token }}" class="btn btn-sm">Download</a></td>
                                      
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="padding: 5%;">
                            @if(count($ans) == 0)
                                <p>No response were found for this survey.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection