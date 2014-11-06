<?php

class TemplateTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('template')->delete();
	}

}
