<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schedules', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('date_start');
			$table->dateTime('date_close');
			$table->string('place');
			$table->text('description');
			$table->integer('staff_id')->unsigned();
			$table->foreign('staff_id')->references('id')->on('staffs')->onDelete('cascade');
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
		Schema::drop('schedules');
	}

}
