<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('media_id')->unsigned();
			$table->foreign('media_id')->references('id')->on('medias')->onDelete('cascade');
			$table->string('file');
			$table->string('description');
			$table->integer('download');
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
		Schema::drop('media_items');
	}

}
