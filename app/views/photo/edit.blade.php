@extends('master')

@section('content')
<div class="col-md-12">
	<h2>Resize Photo</h2>

	{{ Form::open(array('route' => array('photo.update',$photo->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('width', 'Width') }}

		{{ Form::text('width') }}
	</div>

	<div class="form-group">
		{{ Form::label('height', 'Height') }}

		{{ Form::text('height') }}
	</div>

	{{ Form::submit('Submit',array('class' => 'btn btn-blue btn-primary')) }}

	{{ Form::close() }}

</div>
@stop