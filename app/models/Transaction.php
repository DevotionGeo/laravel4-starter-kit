<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Transaction extends Eloquent {
	use SoftDeletingTrait;

	public function user(){
		return $this->belongsTo('User');
	}
}