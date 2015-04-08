<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function($table){
			$table->increments('id');
			$table->integer('parent_id');
			$table->string('title');
			$table->string('url');
			$table->string('icon');
			$table->string('class');
			$table->string('order');
			$table->integer('disable');
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
		Schema::drop('menus');
	}

}
