<!DOCTYPE html>
<html>
<head>
	<title>Survey</title>
</head>
<body>
	<form method="post" action='{{ route("sections.store") }}'>
		<div>
			<input type="text" name="name" placeholder="Name">
		</div>
		<div>
			<input type="text" name="status" placeholder="status">
		</div>
		{{ csrf_field() }}
		<button>Submit</button>
	</form>
</body>
</html>