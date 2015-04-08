<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_menus', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('group_id')->unsigned();
			$table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
			$table->integer('menu_id')->unsigned();
			$table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
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
		Schema::drop('group_menus');
	}

}
