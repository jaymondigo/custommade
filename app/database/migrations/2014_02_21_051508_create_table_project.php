<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProject extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function($table){
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->boolean('has_dimension');
			$table->string('dimension');
			$table->boolean('has_budget');
			$table->string('budget');
			$table->softDeletes();
			$table->timeStamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
