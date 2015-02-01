@extends('frontend.layouts.default')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Expense Report</h4>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="col-md-1">#</th>
							<th class="col-md-2">User</th>
							<th class="col-md-2">Date of Expense</th>
							<th class="col-md-2">Date of Entry</th>
							<th class="col-md-4">Expense Memo</th>
							<th class="col-md-1">Amount (in Rs.)</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						@foreach($data as $user)
							@if(count($user->transactions) > 0)
								@foreach($user->transactions as $transaction)
								<tr>
									<td>{{ $i++ }}</td>
									<td>{{ $user->fullName() }}</td>
									<td>{{ $transaction->txn_datetime->format(Config::get('app.datetime_format')) }}</td>
									<td>{{ $transaction->created_at->format(Config::get('app.datetime_format')) }}</td>
									<td>{{ $transaction->memo }}</td>
									<td>{{ number_format($transaction->amount, 2) }}/-</td>
								</tr>
								@endforeach
								<tr>
									<th colspan="5" class="text-right">
										Total <small>(in Rs.)</small>: 
									</th>
									<th>{{ number_format($user->transaction_total, 2) }}/-</th>
								</tr>
							@endif
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop