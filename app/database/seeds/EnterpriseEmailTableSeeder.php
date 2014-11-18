<?php

class EnterpriseEmailTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('enterpriseemail')->delete();
		
		// Truncate the table, auto-increment has been reset.
		DB::table('enterpriseemail')->truncate();
		
	$faker = Faker\Factory::create();
		
	for ($i = 0; $i < 10; $i++){
	
		Enterpriseemail::create(array(
			'orderid'     => $faker->numberBetween($min = 1, $max = 5), 
			'type'    => 'EnterpriseEmail',
			'name'    => $faker->domainname,
			'provider'    => $faker->company,
			'storage'    => $faker->randomElement($array = array (-1, $faker->numberBetween($min = 100, $max = 1000000) )),
			'accountNumber'    => $faker->randomElement($array = array (-1, $faker->numberBetween($min = 10, $max = 100) )),
			'serviceYear'    =>$faker->randomElement($array = array (-1, $faker->numberBetween($min = 1, $max = 5)*12 )),
			'description' => $faker->sentence($nbWords = 5),
			'price' => $faker->numberBetween($min = 100, $max = 10000)
		)); 

	}		
				
		
	}

}
