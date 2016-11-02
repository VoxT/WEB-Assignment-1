<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBinhLuanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('binh_luan', function(Blueprint $table)
		{
			$table->foreign('idDienThoai', 'binh_luan_ibfk_1')->references('idDienThoai')->on('dien_thoai')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('idBaiViet', 'binh_luan_ibfk_2')->references('idBaiViet')->on('bai_viet')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('idUser', 'binh_luan_ibfk_3')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('idBinhLuanCha', 'binh_luan_ibfk_4')->references('idBinhLuan')->on('binh_luan')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id', 'binh_luan_ibfk_5')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('binh_luan', function(Blueprint $table)
		{
			$table->dropForeign('binh_luan_ibfk_1');
			$table->dropForeign('binh_luan_ibfk_2');
			$table->dropForeign('binh_luan_ibfk_3');
			$table->dropForeign('binh_luan_ibfk_4');
			$table->dropForeign('binh_luan_ibfk_5');
		});
	}

}
