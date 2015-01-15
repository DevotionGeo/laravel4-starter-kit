@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Contact us ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
	<h3>Contact us</h3>
</div>
<form method="post" action="" class="form-horizontal">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />

	<!-- Name -->
	<div class="row">
		<div class="col-md-4 col-md-offset-1">
			<div  class="form-group{{ $errors->first('name', ' error') }}">
				<input type="text" id="name" name="name" class="form-control" placeholder="Name">
				{{ $errors->first('name', '<span class="help-block">:message</span>') }}
			</div>
		</div>
	</div>

	<!-- Email -->
	<div class="row">
		<div class="col-md-4 col-md-offset-1">
			<div  class="form-group{{ $errors->first('email', ' error') }}">
				<input type="text" id="email" name="email" class="form-control" placeholder="Email">
				{{ $errors->first('email', '<span class="help-block">:message</span>') }}
			</div>
		</div>
	</div>

	<!-- Description -->
	<div class="row">
		<div class="col-md-4 col-md-offset-1">
			<div  class="form-group{{ $errors->first('description', ' error') }}">
				<textarea rows="4" id="description" name="description" class="form-control" placeholder="Description"></textarea>
				{{ $errors->first('description', '<span class="help-block">:message</span>') }}
			</div>
		</div>
	</div>

	<!-- Form actions -->
	<button type="submit" class="btn btn-success col-md-offset-1">Submit</button>
</form>
@stop
