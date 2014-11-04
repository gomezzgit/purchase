<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
		
	
	public function showMainpage()
	{
		return View::make('main');
	}
	
	public function showOrder()
	{
	
	    $data = Input::all();
		$commnet = Input::get('comment');
		//$table = Input::get('table');
		return View::make('order')->with("data",$data);
	}
	
	}
