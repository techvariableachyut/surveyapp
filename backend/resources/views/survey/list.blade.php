@extends('layouts.app')
@section('content')

<div class="row">


        <div class="col-lg-12">



            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List of all Survey</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#Survey</th>
                                    <th>Survey name/title</th>
                                    <th>action</th>
                                    <th>Link</th>
                                    <th>Responses</th>
                                </tr>
                            </thead>
                            <tbody id="append">
                                @foreach($questions as $index => $question)
                                  <tr>
                                      <td class="text-truncate">{{ $index + 1 }}</td>
                                      <td class="text-truncate"><a href="/create/questions/{{$question->token}}/{{$question->title}}">{{ $question->title }}</a></td>
                                      <td class="text-truncate"> 
                                        <a href="/create/questions/{{$question->token}}/{{$question->title}}" class="btn btn-sm btn-warning">Edit</a> 
                                        <a onclick="deleteSurvey('{{$question->token}}')" href="#" class="btn btn-sm btn-danger">Delete</a>
                                        <a onclick="copy('{{$question->token}}',{{ $index + 2 }})"href="#"  class="btn btn-sm btn-success">Duplicate</a>
                                      </td>
                                       <td><a target="_blank" href="/monitoring-tool/{{ $question->token }}" class="btn btn-sm btn-success">Share survey link</a></td>
                                       <td><a href="/survey/answer/{{$question->token}}">View</a></td>
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection

<script>
function deleteSurvey(token){
    event.preventDefault();
    var conf = confirm('Are you sure?')
    conf ? window.location.replace('/survey/delete/'+token) : false
}

function copy(id){
    event.preventDefault(); 
    $.ajax({ 
        type: 'POST', 
        url: "/survey/copy/" + id + "",
        data:{_token:"{{ Session::token() }}"}
    })   
    .done(function(msg){
        var index = $("#indexid").text();
        token = "{{ Session::token() }}";
        $("#append").append(
            "<tr> \
                <td class='text-truncate'> \
                    <a href='#'>"+index+"</a> \
                </td> \
                <td class='text-truncate'>"+msg['new']['title']+"</td> \
                <td class='text-truncate'> \
                    <a href='/create/questions/"+msg['new']['token']+"' class='btn btn-sm btn-warning'>Edit</a> \
                    <a href='/survey/delete/"+msg['new']['token']+"' class='btn btn-sm btn-danger'>Delete</a> \
                    <a href='#' onclick='event.preventDefault(); copy("+msg['new']['token']+")' class='btn btn-sm btn-success'>Duplicate survey</a>\
                </td> \
                <td> \
                    <a target='_blank' href='' class='btn btn-sm btn-success'>Share survey link</a> \
                </td> \
                <td> \
                    <a href="/survey/answer/{{$question->token}}">View</a>  \
                </td> \
            </tr>"
        );
    })
}

</script>