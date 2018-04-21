@extends('layouts.app')

@section('content')
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
                                    <th>Downlaod</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($answers as $index => $a)
                                  <tr>
                                      <td class="text-truncate"><a href="#">{{ $index + 1 }}</a></td>
                                      <td class="text-truncate">
                                          @if($a == false)
                                            Incomplete
                                          @else
                                            Done
                                          @endif
                                      </td>
                                      <td><a href="" class="btn btn-sm">Download</a></td>
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection