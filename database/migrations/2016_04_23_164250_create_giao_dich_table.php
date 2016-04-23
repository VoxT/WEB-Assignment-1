<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGiaoDichTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('giao_dich', function(Blueprint $table)
		{
			$table->integer('idGiaoDich')->primary();
			$table->integer('idUser')->nullable();
			$table->string('tenNguoiMua', 30);
			$table->string('sdtNguoiMua', 20);
			$table->integer('idDienThoai')->index('idDienThoai');
			$table->string('noiDungThanhToan', 80);
			$table->integer('cachThanhToan');
			$table->index(['idUser','idDienThoai'], 'idUser');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('giao_dich');
	}

}
