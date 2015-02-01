<?php

class TransactionsController extends AuthorizedController {
	public function startApp(){
		$transactions = Sentry::getUser()->transactions()->orderBy('created_at', 'DESC')->get();
		$totalExpense = Sentry::getUser()->transactions()->sum('amount');

		return View::make('frontend.transactions.app')
			->withTransactions($transactions)
			->withTotalExpense($totalExpense);
	}

	public function addTransaction(){
		$input = Input::all();

		$validation = Validator::make($input, [
			'amount' => 'required|numeric',
			'memo' => 'required',
			'txn_date' => 'required'
		]);

		if($validation->fails()){
			return Redirect::back()->withErrors($validation)->withInput();
		}

		$transaction = new Transaction;

		$transaction->amount = $input['amount'];
		$transaction->memo = $input['memo'];
		$transaction->user_id = Sentry::getUser()->id;
		$transaction->txn_datetime = $input['txn_date'];

		$transaction->save();

		return Redirect::route('transactions')->withSuccess('Transaction has been recorded');
	}

	public function updateTransaction(){

	}

	public function deleteTransaction($id){
		try {
			Transaction::destroy($id);
		}
		catch(Exception $e) {
			return Redirect::route('transactions')->withError('Unable to delete transaction');
		}

		return Redirect::route('transactions')->withSuccess('Transaction has been archived');
	}

	public function getReport(){
		return View::make('frontend.transactions.report');
	}

	public function postReport(){

	}
}