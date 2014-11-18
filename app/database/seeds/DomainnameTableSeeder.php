<?php

class DomainnameTableSeeder extends Seeder
{

	public function run()
	{
	//DB::table('domainname')->delete();
		
	// Truncate the table, auto-increment has been reset.
	//DB::table('domainname')->truncate();
	
	$faker = Faker\Factory::create();
		
	for ($i = 0; $i < 10; $i++){
	
		Domainname::create(array(
			'orderid'     => $faker->numberBetween($min = 1, $max = 5), 
			'type'    => 'DomainName',
			'name'    => $faker->domainname,
			'serviceYear'    =>$faker->randomElement($array = array (-1, $faker->numberBetween($min = 1, $max = 5)*12 )),
			'description' => $faker->sentence($nbWords = 5),
			'price' => $faker->numberBetween($min = 100, $max = 10000)
		)); 

	}	
	
	
	
	
	}

}
