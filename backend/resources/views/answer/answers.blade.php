@extends('layouts.app')

@section('content')
<style>
.pagination{
    float: right;
    padding-right: 10px;
}
</style>
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
                                    <th>Tracking Code</th>
                                    <th>Status</th>
                                    <th>View Response</th>
                                    <th>Downlaod</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ans as $index => $a)
                                 
                                  <tr>
                                      <td class="text-truncate"><a href="#">{{json_decode($a->answer)->data->question995}}</a></td>
                                      <td class="text-truncate">
                                          {{ $a->done }}
                                      </td>
                                      <td> <a href="/survey/answer/user/{{$a->surveyId}}/{{$a->token}}">View</a></td>
                                      <td><a href="/answer/create/csv/{{ $a->surveyId }}/{{ $a->token }}" class="btn btn-sm">Download</a></td>
                                      
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{ $ans->links() }}
                        </div>
                        
                        <div style="padding: 10px;">
                            @if(count($ans) == 0)
                                <p>No response were found for this survey.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection