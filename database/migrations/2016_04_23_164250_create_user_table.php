<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->integer('idUser')->primary();
			$table->string('userName', 30);
			$table->string('password', 30);
			$table->string('ten', 30);
			$table->string('soDienThoai', 20);
			$table->string('diaChi', 60);
			$table->string('email', 80);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
