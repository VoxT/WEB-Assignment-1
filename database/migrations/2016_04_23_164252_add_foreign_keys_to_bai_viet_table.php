<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBaiVietTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bai_viet', function(Blueprint $table)
		{
			$table->foreign('idAdmin', 'bai_viet_ibfk_1')->references('idAdmin')->on('admin')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bai_viet', function(Blueprint $table)
		{
			$table->dropForeign('bai_viet_ibfk_1');
		});
	}

}
