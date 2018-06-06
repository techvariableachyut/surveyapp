@extends('layouts.app')
@section('content')
	<div class="col-lg-12">
		<div class="col-lg-6">
			<form method="post" action="{{ route('settings.store') }}">
				{{ csrf_field() }}

				<div class="form-group">
					<input type="text" name="name" class="form-control" placeholder="Name">
				</div>


				<div class="form-group">
					<input type="text" name="email" class="form-control" placeholder="Email">
				</div>


				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Password">
				</div>
				<div class="form-group">
					<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
				</div>

				<button class="btn btn-sm btn-primary">
					Save
				</button>
			</form>
		</div>
	</div>
@endsection