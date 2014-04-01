<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnAddressesToUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table){
			$table->string('title');
			$table->string('address1');
			$table->string('address2');
			$table->string('address3');
			$table->string('country');
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
			$table->dropColumn('title');
			$table->dropColumn('address1');
			$table->dropColumn('address2');
			$table->dropColumn('address3');
			$table->dropColumn('country');
		});
	}

}
