<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email');
			$table->string('password');
			$table->string('phone');
			$table->string('bio');
			$table->string('avatar');
			$table->string('nationalty');
			$table->string('gender');
		});


    }

	public function down()
	{
		Schema::drop('clients');
	}
}
