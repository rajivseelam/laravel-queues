<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

	<style type="text/css">
	body
	{
		padding-top: 20px;
	}
	</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12 well">
				<h1>Let's Learn Queues</h1>
				<div class="pull-right">
					<a href="{{ route('job.index') }}" class="btn btn-primary">Jobs</a>
					<a href="{{ route('photo.index') }}" class="btn btn-primary">Photos</a>
				</div>
			</div>

			@yield('content')
		</div>
	</div>

</body>
</html>
