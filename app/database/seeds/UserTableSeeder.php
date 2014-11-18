<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		
	$faker = Faker\Factory::create();
		
	for ($i = 0; $i < 3; $i++)
	{
		User::create(array(
			'name'     => $faker->userName,
			'email'    => $faker->email,
			'authority'    =>$faker->randomElement($array = array ('user','admin','manager')),
			'password' => Hash::make('123456'),
		)); 

	}
	}

}
