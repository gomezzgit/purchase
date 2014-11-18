<?php

class OrderTableSeeder extends Seeder
{

	public function run()
	{
	//	DB::table('order')->delete();
		
		// Truncate the table, auto-increment has been reset.
	//	DB::table('order')->truncate();
	
	
	$faker = Faker\Factory::create();
		
	for ($i = 0; $i < 10; $i++){
	
		Order::create(array(
			'customer_name'     => $faker->userName,
			'chinese_name'     => $faker->userName,
			'english_name'     => $faker->userName,
			'state'    => $faker->randomElement($array = array ('waiting','finished','purchasing','quoting','cancel')),
			'requested_at'    => $faker->date($format = 'Y-m-d', $max = 'now'), 
			'requested_by'    => $faker->numberBetween($min = 1, $max = 10), 
			'final_price'    => $faker->numberBetween($min = 1, $max = 1000000), 
			'comment'    => $faker->sentence($nbWords = 10)
			
		)); 

	}
	
	
	
	
	
	}

}
