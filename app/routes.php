<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

Route::get('users', 'UsersController@showPurchaseForm');

Route::get('author', function()
{
  
  $name = "Lindddddd";
  $data = array('name'=>'linda', 'email'=>'linda@gmail.com', 'date'=>'2014-10-29');
  $data1 = Response::json(array('name'=>'Chris', 'email'=>'Chris@gmail.com', 'date'=>'2014-11-03'));
  $data2 = User::all();
  $data3 = json_encode($data);
  

  
  //$dd = ['msg' =>'i love lavravel'];

  // return View::make('author')->with('name', $name);
   //return View::make('author',array("name"=>"linda"));
   return View::make('author')->with("data",$data);

   // return View::make('author');
	
	
});





	// route to show the login form
	Route::get('login', array('as' => 'login', 'uses' => 'AuthController@showLogin'));
	// route to handle login
	Route::post('login', array('as' => 'login', 'uses' => 'AuthController@handleLogin'));
	Route::get('logout', 'AuthController@getLogout');
	
	

	//route group
	Route::group(array('before' => 'auth'), function()
	{
	
    Route::get('pf', function()
	{
  
	return View::make('purchaseForm');	
	
	});
	
	Route::get('main', 'HomeController@showMainpage');
	Route::post('order', 'HomeController@showOrder');
	
	});//end route group

	
