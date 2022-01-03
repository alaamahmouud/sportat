<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationsTable extends Migration {

	public function up()
	{
		Schema::create('notifications', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
			$table->string('content');
			$table->enum('action', array('newmessage', 'newlike', 'newcomment', 'newpost','join','accept-join','follow'));
			$table->integer('notifiable_id');
			$table->string('notifiable_type');

		});
	}

	public function down()
	{
		Schema::drop('notifications');
	}
}
