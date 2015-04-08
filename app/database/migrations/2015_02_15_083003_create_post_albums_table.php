<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostAlbumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_albums', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('post_id')->unsigned();
			$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
			$table->integer('album_id')->unsigned();
			$table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
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
		Schema::drop('post_albums');
	}

}
