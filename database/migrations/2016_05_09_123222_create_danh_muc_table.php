<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDanhMucTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('danh_muc', function(Blueprint $table)
		{
			$table->integer('idDanhMuc', true);
			$table->string('tenLoaiDienThoai', 30);
			$table->integer('idDanhMucCha')->nullable()->index('idDanhMucCha');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('danh_muc');
	}

}
