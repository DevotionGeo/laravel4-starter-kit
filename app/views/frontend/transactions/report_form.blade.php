@extends('frontend.layouts.default')

@section('content')
<div class="row">
	<div class="col-md-offset-4 col-md-4">
		<form class="form-horizontal" action="{{ route('transactions.report') }}" method="post">
			{{ Form::token() }}
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						Criteria Selection
					</div>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="users" class="col-md-3 control-label">Users</label>
						<div class="col-md-9">
							{{ Form::users('users', true) }}
						</div>
					</div>
					<div class="form-group">
						<label for="users" class="col-md-3 control-label">Month</label>
						<div class="col-md-9">
							{{ Form::month('month') }}
						</div>
					</div>
					<div class="form-group">
						<label for="users" class="col-md-3 control-label">Year</label>
						<div class="col-md-9">
							{{ Form::year('year') }}
						</div>
					</div>
				</div>
				<div class="panel-footer clearfix">
					<div class="col-md-offset-4 col-md-4">
						<button type="submit" class="btn btn-success form-control">Submit</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@stop