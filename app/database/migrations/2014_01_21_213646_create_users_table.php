<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('username');
			$table->string('email');
			$table->string('password');
			$table->boolean('is_maker');
			$table->boolean('is_buyer');
			$table->enum('status',array('suspended','active','deleted'));
			$table->string('first_name');
			$table->string('last_name');
			$table->string('fb_id');
			$table->string('google_id');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table){
			$table->dropColumn('id','username','password','first_name','last_name','fb_id','google_id');
		});
	}

}