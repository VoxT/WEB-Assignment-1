<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDienThoaiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dien_thoai', function(Blueprint $table)
		{
			$table->integer('idDienThoai')->primary();
			$table->string('ten', 100);
			$table->integer('gia');
			$table->integer('giamGia');
			$table->string('linkAnhDaiDien', 50);
			$table->text('listLinkAnhGioiThieu', 65535);
			$table->text('moTa', 65535);
			$table->text('khuyenMai', 65535);
			$table->text('thongSoKiThuat', 65535);
			$table->integer('IdDanhMuc')->index('IdDanhMuc');
			$table->integer('idAdmin')->index('idAdmin');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dien_thoai');
	}

}
