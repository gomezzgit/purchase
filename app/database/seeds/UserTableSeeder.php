<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'name'     => 'Chris',
			'email'    => 'chris@scotch.io',
			'password' => Hash::make('123456'),
		));
		
		User::create(array(
			'name'     => 'Eric',
			'email'    => 'Eric@gmail.com',
			'password' => Hash::make('123'),
		));
	}

}
