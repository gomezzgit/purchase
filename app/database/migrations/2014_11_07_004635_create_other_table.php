<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('other', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('orderid');
			$table->string('type', 32);
			$table->string('demoURL', 255);
			$table->string('description', 255)->nullable();
			$table->float('price');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('other');
	}

}
