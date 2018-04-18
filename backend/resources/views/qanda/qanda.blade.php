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
                                    <th>Answer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($qanda as $index => $value)
                                  <tr>
                                      <td class="text-truncate"><a href="#">{{ $index + 1 }}</a></td>
                                      <td class="text-truncate">
                                      	{{ $value->title }}
                                      </td>
                                      <td class="text-truncate">
                                        <a href="/survey/answer/{{ $value->token }}" class="btn btn-sm btn-info">view</a>
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