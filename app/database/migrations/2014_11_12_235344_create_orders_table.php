<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');			
			$table->string('customer_name', 255);
			$table->string('chinese_name', 255);
			$table->string('english_name', 255);
			$table->string('state', 32);
			$table->date('requested_at');
			$table->date('authorised_at')->nullable();
			$table->integer('requested_by');
			$table->integer('authorised_by')->nullable();
			$table->integer('prefer_authorizer')->nullable();
			$table->integer('final_price')->nullable();
			$table->string('comment', 255)->nullable();
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
