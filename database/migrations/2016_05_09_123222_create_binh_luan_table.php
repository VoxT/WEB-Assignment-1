<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBinhLuanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('binh_luan', function(Blueprint $table)
		{
			$table->integer('idBinhLuan', true);
			$table->integer('idDienThoai')->nullable()->index('idDienThoai');
			$table->integer('idUser');
			$table->integer('idBaiViet')->nullable()->index('idBaiViet');
			$table->integer('idBinhLuanCha')->nullable()->index('idBinhLuanCha');
			$table->text('noiDung', 65535);
			$table->timestamp('thoiGian')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('id')->nullable()->index('id');
			$table->index(['idUser','idBaiViet','idBinhLuanCha'], 'idUser');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('binh_luan');
	}

}
