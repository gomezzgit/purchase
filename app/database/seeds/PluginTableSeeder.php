<?php

class PluginTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('plugin')->delete();
		
		// Truncate the table, auto-increment has been reset.
		DB::table('plugin')->truncate();
		
		
	$faker = Faker\Factory::create();
		
	for ($i = 0; $i < 40; $i++){
	
		Plugin::create(array(
			'orderid'     => $faker->numberBetween($min = 5, $max = 50), 
			'type'    => 'Plugin',
			'demoURL'    => $faker->url,
			'orderURL'    =>$faker->url,
			'description' => $faker->sentence($nbWords = 5),
			'price' => $faker->numberBetween($min = 100, $max = 10000)
		)); 

	}	
		
	}

}
