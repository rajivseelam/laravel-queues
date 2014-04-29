@extends('master')

@section('content')
<div class="col-md-12">
	<h2>Upload New Photo</h2>

	{{ Form::open(array('route' => array('photo.store'),'files' => true)) }}

	<div class="form-group">
		{{ Form::file('photo') }}
	</div>

	{{ Form::submit('Upload',array('class' => 'btn btn-blue btn-primary')) }}

	{{ Form::close() }}

</div>
@stop