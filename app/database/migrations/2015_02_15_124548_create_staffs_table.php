<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaffsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staffs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('position_id')->unsigned();
			$table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
			$table->string('motto');
			$table->string('file');
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
		Schema::drop('staffs');
	}

}
