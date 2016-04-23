<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaiVietTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bai_viet', function(Blueprint $table)
		{
			$table->integer('idBaiViet')->primary();
			$table->integer('idAdmin')->index('idAdmin');
			$table->text('noiDung', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bai_viet');
	}

}
