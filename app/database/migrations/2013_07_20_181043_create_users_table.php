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

			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('username', 30)->unique();
			$table->string('password', 60);
			$table->string('bio')->nullable();
			$table->string('avatar', 4)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}