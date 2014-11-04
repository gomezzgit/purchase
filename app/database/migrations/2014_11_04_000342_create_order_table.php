<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order', function(Blueprint $table)
		{
			$table->increments('id');			
			$table->string('customer_name', 32);
			$table->string('chinese_name', 32);
			$table->string('english_name', 32);
			$table->string('state', 32);
			$table->date('requested_at');
			$table->date('authorised_at')->nullable();
			$table->integer('requested_by');
			$table->integer('authorised_by')->nullable();
			$table->string('comment', 100)->nullable();
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order');
	}

}
