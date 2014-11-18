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

//for test
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

Route::get('auth', function()
{
  
 return View::make('auth');
	
});

//end test



	Route::get('orderlist', 'OrderController@showOrder');




	// route to show the login form
	Route::get('login', array('as' => 'login', 'uses' => 'AuthController@showLogin'));
	// route to handle login
	Route::post('login', array('as' => 'login', 'uses' => 'AuthController@handleLogin'));
	Route::get('logout', 'AuthController@getLogout');
	
	

	//route group
	Route::group(array('before' => 'auth'), function()
	{
	
    Route::get('pf', 'HomeController@showOrderPage');
	
	Route::get('main', 'HomeController@showMainpage');
//	Route::post('makeOrder', 'OrderController@showForm');  //for test
	Route::post('makeOrder', 'OrderController@storeOrder');
	Route::get('show/{id}','OrderController@showOrderDetail');  //show order detail based on order ID
	Route::get('modify/{id}','OrderController@orderModifyPage');  //show order modify page based on order ID
	Route::get('authorize/{id}','OrderController@orderAuthorizePage');  //show order authorize page based on order ID
	
	
	//update modify order
	Route::post('updateOrder','OrderController@updateOrder'); 
	Route::post('cancelOrder','OrderController@cancelOrder'); 
	Route::post('authorizeOrder','OrderController@authorizeOrder'); 
	
	});//end route group
	
