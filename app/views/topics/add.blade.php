@extends('frontend.layouts.default')

@section('title')
Add new Topic
@stop

@section('content')
<div class="row">
	<div class="col-sm-offset-3 col-sm-6">
		<form class="form-horizontal" action="{{ url('topics/add') }}" method="POST">
			{{ Form::token() }}
			<div class="form-group">
				<label for="name" class="col-sm-3">Name:</label>
				<div class="col-sm-9">
					<input type="text" name="name" class="form-control" />
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-3">Description:</label>
				<div class="col-sm-9">
					<textarea name="description" class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<button type="submit" class="btn btn-success form-control">Add</button>
				</div>
			</div>
		</form>
	</div>
</div>
@stop