<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('history', function(Blueprint $table)
		{
			$table->foreign('id_user', 'history_ibfk_1')->references('id_user')->on('user')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('id_book', 'history_ibfk_2')->references('id_book')->on('book')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('history', function(Blueprint $table)
		{
			$table->dropForeign('history_ibfk_1');
			$table->dropForeign('history_ibfk_2');
		});
	}

}
