<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDanhMucTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('danh_muc', function(Blueprint $table)
		{
			$table->foreign('idDanhMucCha', 'danh_muc_ibfk_1')->references('idDanhMuc')->on('danh_muc')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('danh_muc', function(Blueprint $table)
		{
			$table->dropForeign('danh_muc_ibfk_1');
		});
	}

}
