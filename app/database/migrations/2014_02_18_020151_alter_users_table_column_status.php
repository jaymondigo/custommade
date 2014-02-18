<?php

use Illuminate\Database\Migrations\Migration;

class AlterUsersTableColumnStatus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table){
			$table->dropColumn('status');			
		});

		Schema::table('users', function($table){
			$table->enum('status', array('suspended','active','deleted', 'unconfirmed'))->default('active');
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
	}

}