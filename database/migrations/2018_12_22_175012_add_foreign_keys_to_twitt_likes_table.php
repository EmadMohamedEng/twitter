<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTwittLikesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('twitt_likes', function(Blueprint $table)
		{
			$table->foreign('user_id', 'twitt_likes_ibfk_1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'twitt_likes_ibfk_2')->references('id')->on('twitts')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('twitt_likes', function(Blueprint $table)
		{
			$table->dropForeign('twitt_likes_ibfk_1');
			$table->dropForeign('twitt_likes_ibfk_2');
		});
	}

}
