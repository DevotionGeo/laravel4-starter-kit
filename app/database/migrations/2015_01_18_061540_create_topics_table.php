<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('topics', function($table){
			$table->increments('id'); // INTEGER(11) NOT NULL AUTO INCREMENT PRIMARY KEY

			$table->string('name'); // Fixed length
			$table->text('description'); // Not fixed length
			$table->integer('user_id')->unsigned();
			$table->timestamps(); // created_at, updated_at columns

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('topics');
	}

}
