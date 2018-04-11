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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($questions as $index => $question)
                                  <tr>
                                      <td class="text-truncate"><a href="#">{{ $index + 1 }}</a></td>
                                      <td class="text-truncate">{{ $question->title }}</td>
                                      <td class="text-truncate">
                                        <a href="" class="btn btn-sm btn-info">view</a> <a href="" class="btn btn-sm btn-warning">Edit</a> <a href="" class="btn btn-sm btn-danger">Delete</a>
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