@extends('master')

@section('content')
<div class="col-md-12">
	<h2>Photos</h2>
	<a href="{{ route('photo.create') }}" class="btn btn-primary">Upload New Photo</a> <br><br>

	<table class="table">

 		<thead>
	 		<tr>
	 			<th>#</th>
	 			<th>Path</th>
	 			<th>Actions</th>
	 		</tr>
 		</thead>

 		<tbody>
 			@foreach($photos as $photo)
 				<tr>
 					<td>{{ $photo->id }}</td>

 					<td>
	 					<a href="{{ url($photo->path) }}">
	 						{{ url($photo->path) }}
	 					</a>
 					</td>

 					<td>
 						<a href="{{ route('photo.edit', $photo->id) }}" class="btn btn-primary btn-xs">		
 							Resize
 						</a>
 					</td>
 				</tr>
 			@endforeach
 		</tbody>
 		
	</table>
</div>
@stop