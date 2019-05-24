<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book', function(Blueprint $table)
		{
			$table->integer('id_book', true);
			$table->integer('id_category')->index('id_category');
			$table->integer('id_penerbit')->index('id_penerbit');
			$table->string('judul', 250);
			$table->string('pengarang', 250);
			$table->string('isbn', 250);
			$table->date('tahun');
			$table->string('file', 250);
			$table->string('thumbnail', 100);
			$table->integer('upload_at');
			$table->integer('upload_by');
			$table->integer('uploader');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('book');
	}

}
