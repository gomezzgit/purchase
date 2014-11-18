<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePluginTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plugin', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('orderid');
			$table->string('type', 32);
			$table->string('demoURL', 255);
			$table->string('orderURL', 255);
			$table->string('description', 255)->nullable();
			$table->integer('price');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plugin');
	}

}
