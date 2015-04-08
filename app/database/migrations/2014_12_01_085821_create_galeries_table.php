<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('galeries', function($table){
			$table->increments('id');
			$table->integer('album_id')->unsigned();
			$table->foreign('album_id')->on('files')->onDelete('cascade');
			$table->string('file');
			$table->string('description');
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
		Schema::drop('galeries');
	}

}
