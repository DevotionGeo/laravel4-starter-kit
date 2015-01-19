@extends('test.master_layout')

@section('title')
Welcome to my web application
@stop

@section('content')
<div clsss="row">
	<div class="col-sm-4">
		<!-- Sidebar -->
		<h1>Sidebar</h1>
	</div>
	<div class="col-sm-8">
		<!-- Main content -->
		<h1>Main Content</h1>
	</div>
</div>
@stop