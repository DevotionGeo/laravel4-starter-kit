<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Carbon\Carbon;

class Transaction extends Eloquent {
	use SoftDeletingTrait;

	public function user(){
		return $this->belongsTo('User');
	}

	public function scopePeriod($query, $month, $year){
		$start = Carbon::create($year, $month)->firstOfMonth();
		$last = Carbon::create($year, $month)->lastOfMonth();

		$query->where('txn_datetime', '>=', $start);
		$query->where('txn_datetime', '<=', $last);

		$query->orderBy('txn_datetime', 'ASC');
	}

	public function getTxnDatetimeAttribute($value){
		return Carbon::parse($value);
	}
}