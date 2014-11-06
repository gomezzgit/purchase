<?php

class OrderTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('order')->delete();
	}

}
