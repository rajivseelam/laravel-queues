@extends('master')

@section('content')
<div class="col-md-12">
	<table class="table">
 		<thead>
	 		<tr>
	 			<th>#</th>
	 			<th>Job ID</th>
	 			<th>Status</th>
	 		</tr>
 		</thead>

 		<tbody>
 			@foreach($jobs as $job)
 				<tr>
 					<td>{{ $job->id }}</td>
 					<td>{{ $job->job_id }}</td>
 					<td>{{ $job->status }}</td>
 				</tr>
 			@endforeach
 		</tbody>
 		
	</table>
</div>
@stop