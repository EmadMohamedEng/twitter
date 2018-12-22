<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTwittLikesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('twitt_likes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('twi_user_fk1');
			$table->integer('twitt_id')->index('twitt_likes_ibfk_2');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('twitt_likes');
	}

}
