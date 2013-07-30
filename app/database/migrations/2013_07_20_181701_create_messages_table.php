<?php

use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('message', 140);
			$table->integer('user_id')->unsigned();
			$table->timestamp('created_at'); // default : current_timestamp -> auto
		
			$table->foreign('user_id')
				  ->references('id')
				  ->on('users')
				  ->on_update('cascade')
				  ->on_delete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('messages');
	}

}