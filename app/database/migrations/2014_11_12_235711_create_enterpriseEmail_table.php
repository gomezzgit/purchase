<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnterpriseemailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enterpriseemail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('orderid');
			$table->string('type', 32);
			$table->string('name', 255);   //domain name
			$table->string('provider', 255);   
			$table->integer('storage');
			$table->integer('accountNumber');
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
		Schema::drop('enterpriseemail');
	}

}
