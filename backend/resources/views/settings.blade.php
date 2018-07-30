@extends('layouts.app')
@section('content')
	<div class="col-lg-12">

	@if(Session::has('upadteStatus'))
		<div class="alert alert-success">
			<strong>Success!</strong> Profile updated successfully!
		</div>
	@endif

		<div class="col-lg-6">
			<h4>Edit Your Profile</h4>
			<form method="post" action="{{ route('settings.store') }}">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
				</div>

				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" value="{{ $user->username }}" class="form-control" placeholder="Username">
				</div>

				<div class="form-group">
					<label for="Password">Password</label>
					<input type="password" name="password"  class="form-control" placeholder="Password">
				</div>
				<div class="form-group">
					<label for="Password">Confirm Password</label>
					<input type="password" name="confirm_password"  class="form-control" placeholder="Confirm Password">
				</div>

				<button class="btn btn-sm btn-primary">
					Update
				</button>
			</form>
		</div>

	</div>
@endsection