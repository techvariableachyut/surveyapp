@extends('layouts.app')

@section('content')
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
                                    <th>Survey name/title</th>
                                    <th>action</th>
                                    <th>Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($answers as $index => $a)
                                  <tr>
                                      <td class="text-truncate"><a href="#">{{ $index + 1 }}</a></td>
                                      <td class="text-truncate">{{ $a->email }}</td>
                                      <td class="text-truncate">
                                                done
                                      </td>
                                      <td>
                                        <a href="/survey/answer/user/{{$a->surveyId}}/{{$a->token}}">View</a>
                                      </td>
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection