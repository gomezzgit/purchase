<?php

class TemplateTableSeeder extends Seeder
{

	public function run()
	{
		//DB::table('template')->delete();
		
		// Truncate the table, auto-increment has been reset.
		//DB::table('template')->truncate();
		
	$faker = Faker\Factory::create();
		
	for ($i = 0; $i < 40; $i++){
	
		Template::create(array(
			'orderid'     => $faker->numberBetween($min = 5, $max = 50), 
			'type'    => 'Template',
			'demoURL'    => $faker->url,
			'orderURL'    =>$faker->url,
			'description' => $faker->sentence($nbWords = 5),
			'price' => $faker->numberBetween($min = 100, $max = 10000)
		)); 

	}	
			
		
	}

}
