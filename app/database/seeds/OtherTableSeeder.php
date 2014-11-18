<?php

class OtherTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('other')->delete();
		
		// Truncate the table, auto-increment has been reset.
		DB::table('other')->truncate();
	
		
	$faker = Faker\Factory::create();
		
	for ($i = 0; $i < 5; $i++){
	
		Other::create(array(
			'orderid'     => $faker->numberBetween($min = 1, $max = 50), 
			'type'    => 'Other',
			'demoURL'    => $faker->url,
			'description' => $faker->sentence($nbWords = 5),
			'price' => $faker->numberBetween($min = 100, $max = 10000)
		)); 

	}		
		
		
	}

}
