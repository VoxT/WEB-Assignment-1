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
			$table->integer('idGiaoDich', true);
			$table->integer('idUser')->nullable();
			$table->string('tenNguoiMua', 30);
			$table->string('sdtNguoiMua', 20);
			$table->integer('idDienThoai')->index('idDienThoai');
			$table->string('diachi', 80);
			$table->integer('trangThaiThanhToan');
			$table->string('email', 30);
			$table->timestamp('ngayTao')->default(DB::raw('CURRENT_TIMESTAMP'));
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
