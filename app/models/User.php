<?php

use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends SentryUserModel {

	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

	/**
	 * Returns the user full name, it simply concatenates
	 * the user first and last name.
	 *
	 * @return string
	 */
	public function fullName()
	{
		return "{$this->first_name} {$this->last_name}";
	}

	/**
	 * Returns the user Gravatar image url.
	 *
	 * @return string
	 */
	public function gravatar()
	{
		// Generate the Gravatar hash
		$gravatar = md5(strtolower(trim($this->gravatar)));

		// Return the Gravatar url
		return "//gravatar.org/avatar/{$gravatar}";
	}
}
