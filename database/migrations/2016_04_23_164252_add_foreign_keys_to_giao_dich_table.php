<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGiaoDichTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('giao_dich', function(Blueprint $table)
		{
			$table->foreign('idUser', 'giao_dich_ibfk_1')->references('idUser')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('idDienThoai', 'giao_dich_ibfk_2')->references('idDienThoai')->on('dien_thoai')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('giao_dich', function(Blueprint $table)
		{
			$table->dropForeign('giao_dich_ibfk_1');
			$table->dropForeign('giao_dich_ibfk_2');
		});
	}

}
