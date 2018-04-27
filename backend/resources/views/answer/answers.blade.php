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
                <div class="card-header">
                    <h4 class="card-title">{{$question->title}}</h4>
                </div>
                <div class="card-body">
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
                                      <td class="text-truncate"><a href="#">{{ $index + 1 }}</a></td>
                                      <td class="text-truncate">
                                          @if($a->done == false)
                                            Incomplete
                                          @else
                                            Done
                                          @endif
                                      </td>
                                      <td> <a href="/survey/answer/user/{{$a->surveyId}}/{{$a->token}}">View</a></td>
                                      <td><a href="/answer/create/csv/{{ $a->surveyId }}/{{ $a->token }}" class="btn btn-sm">Download</a></td>
                                      
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection