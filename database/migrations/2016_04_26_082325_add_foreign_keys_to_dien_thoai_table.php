<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDienThoaiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('dien_thoai', function(Blueprint $table)
		{
			$table->foreign('idAdmin', 'dien_thoai_ibfk_1')->references('idAdmin')->on('admin')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('IdDanhMuc', 'dien_thoai_ibfk_2')->references('idDanhMuc')->on('danh_muc')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('dien_thoai', function(Blueprint $table)
		{
			$table->dropForeign('dien_thoai_ibfk_1');
			$table->dropForeign('dien_thoai_ibfk_2');
		});
	}

}
