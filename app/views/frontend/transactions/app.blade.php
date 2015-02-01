@extends('frontend.layouts.default')

@section('title')
Expense Trackings - @parent
@stop

@section('content')
<div class="row">
	<div class="col-md-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Total Expense</h4>
			</div>
			<div class="panel-body">
				<strong>Rs. {{ number_format($total_expense, 2) }}</strong>
			</div>
		</div>
	</div>
	<div class="col-md-7">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Expense Transactions</h4>
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th class="col-md-2">Date</th>
							<th class="col-md-2">Amount</th>
							<th class="col-md-6">Memo</th>
							<th class="col-md-2"></th>
						</tr>
					</thead>
					<tbody>
						@foreach($transactions as $transaction)
						<tr>
							<td>{{ $transaction->txn_datetime }}</td>
							<td>Rs. {{ number_format($transaction->amount, 2) }}</td>
							<td>{{ $transaction->memo }}</td>
							<td>
								<a href="#" class="btn btn-xs btn-info">Edit</a> 
								<a href="{{ route('transactions.delete', $transaction->id) }}" class="btn btn-xs btn-danger">Delete</a> 
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>Record Transaction</h4>
			</div>
			<div class="panel-body">
				<form class="form-vertical" action="{{ route('transactions.add') }}" method="post">
					{{ Form::token() }}
					<div class="form-group {{ ($errors->has('amount')) ? 'has-error' : '' }}">
						<label for="amount" class="control-label">Amount: </label>
						<input type="text" value="{{ Input::get('amount') }}" class="form-control" name="amount" />
						{{ $errors->first('amount') }}
					</div>

					<div class="form-group {{ ($errors->has('txn_date')) ? 'has-error' : '' }}">
						<label for="txn_date" class="control-label">Date: </label>
						<input type="text" value="{{ Input::get('txn_date') }}" class="form-control txn_datetime" name="txn_date" />
						{{ $errors->first('txn_date') }}
					</div>
					<div class="form-group {{ ($errors->has('memo')) ? 'has-error' : '' }}">
						<label for="memo" class="control-label">Memo: </label>
						<textarea name="memo" class="form-control"></textarea>
						{{ $errors->first('memo') }}
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success form-control">Record</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop

@section('head')
<link rel="stylesheet" type="text/css" media="screen"
     href="{{ asset('assets/datetime-picker/css/bootstrap-datetimepicker.min.css') }}" />
@stop

@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script type="text/javascript" src="{{ asset('assets/datetime-picker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript">
   $(function () {
        $('.txn_datetime').datetimepicker({
        	defaultDate: "{{ date('Y-m-d H:i:s') }}",
        	format: 'YYYY-MM-DD H:m:s'
        });
    });
</script>
@stop