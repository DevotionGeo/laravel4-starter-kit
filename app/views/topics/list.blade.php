@extends('frontend.layouts.default')

@section('content')
<a href="{{ url('topics/add') }}">Add new Topic</a>
<div class="row">
	<div class="col-md-9">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($topics as $topic)
				<tr>
					<td>{{ $topic->name }}</td>
					<td>{{ $topic->description }}</td>
					<td>
						<a href="{{ url('topics/'.$topic->id.'/edit') }}" class="btn btn-xs btn-primary">Edit</a>		
						<a href="{{ url('topics/'.$topic->id.'/delete') }}" class="delete btn btn-xs btn-danger">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop

@section('footer')
<script type="text/javascript">
$(document).ready(function(){
	$(".delete").click(function(){
		var ask = confirm("Are you sure?");

		if(! ask)
			return false;
	});
});
</script>

@stop