@extends('frontend.layouts.default')

@section('title')
Add new Topic
@stop

@section('content')
<div class="row">
	<div class="col-sm-offset-3 col-sm-6">
		<form class="form-horizontal" action="{{ url('topics/'.$data->id.'/edit') }}" method="POST">
			{{ Form::token() }}
			<div class="form-group">
				<label for="name" class="col-sm-3">Name:</label>
				<div class="col-sm-9">
					<input type="text" name="name" value="{{ $data->name }}" class="form-control" />
					{{ $errors->first('name') }}
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-3">Description:</label>
				<div class="col-sm-9">
					<textarea name="description" class="form-control">{{ $data->description }}</textarea>
					{{ $errors->first('description') }}
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<button type="submit" class="btn btn-success form-control">Save Changes</button>
				</div>
			</div>
		</form>
	</div>
</div>
@stop