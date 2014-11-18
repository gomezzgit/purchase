<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainNameTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('domainName', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('orderid');
			$table->string('type', 32);
			$table->string('name', 255);   //domain name
			$table->integer('serviceYear');
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
		Schema::drop('domainName');
	}

}
