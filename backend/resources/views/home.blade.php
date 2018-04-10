@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/create/question" class="btn btn-sm btn-success">Create question</a>

                    <a href="/survey" class="btn btn-sm btn-success">Answer to survey</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
