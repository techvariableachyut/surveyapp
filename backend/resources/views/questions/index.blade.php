<!DOCTYPE html>
<html>
<head>
	<title>Survey</title>
</head>
<body>

<style type="text/css">
	.container{
		width: 70%;
		margin: 5% 15%;
	}
	.input,select{
		border:1px solid #ccc;
		height: 2em;
		margin:5px 0px;
		padding: 1px 10px;
		border-radius: 2px;
		width: 30%;
	}
</style>
<div class="container">
	<form method="post" action='{{ route("questions.store") }}'>
		<div>
			<select name="section">
				@foreach($sections as $section)
					<option value="{{ $section->id }}">{{ $section->name }}</option>
				@endforeach
			</select>
		</div>
		<div>
			<select name="type">
				<option>Drop down</option>
				<option>Textbox</option>
				<option>Time selector</option>
				<option>Date selector</option>
				<option>Drop down</option>
				<option>Drop down -- choose one only</option>
			</select>
		</div>
		<div>
			<input class="input" type="text" name="title" placeholder="Input title">
		</div>
		<div>
			<input type="radio" name="ifForEach" value="true">Yes
			<input type="radio" name="ifForEach" value="false">No
		</div>
		{{ csrf_field() }}
		<button>Submit</button>
	</form>
</div>
</body>
</html>