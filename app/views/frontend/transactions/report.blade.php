@extends('frontend.layouts.default')

@section('content')
<div class="row">
	<div class="col-md-offset-4 col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					Criteria Selection
				</div>
			</div>
			<div class="panel-body">
				<form class="form-horizontal">
					<div class="form-group">
						<label for="users" class="col-md-3 control-label">Users</label>
						<div class="col-md-9">
							<select name="users[]" class="form-control" multiple="multiple">
								@foreach(User::all() as $user)
								<option value="{{ $user['id'] }}">{{ $user['first_name'] }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="users" class="col-md-3 control-label">Users</label>
						<div class="col-md-9">
							<select name="users[]" class="form-control" multiple="multiple">
								@foreach(User::all() as $user)
								<option value="{{ $user['id'] }}">{{ $user['first_name'] }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</form>
			</div>
			<div class="panel-footer">

			</div>
		</div>
	</div>
</div>
@stop