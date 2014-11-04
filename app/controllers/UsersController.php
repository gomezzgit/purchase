<?php

class UsersController extends BaseController {

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

	public function showPurchaseForm()
	{
	 $users = User::all();

    return View::make('users')->with('users', $users);
		
	}
	
	//show login
	public function showLogin()
	{
	 return View::make('login');
		
	}
	
	//handle login
	public function handleLogin()
	{

		/* Get the login form data using the 'Input' class */
        $credentials = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );
 
        /* Try to authenticate the credentials */
        if(Auth::attempt($credentials)) 
        {
            // we are now logged in, go to admin
            return Redirect::to('pf');
        }
        else
        {
		
			// redirect
            Session::flash('message', 'username or password is incorrect');
            return Redirect::to('login');
        }
		
	}

}
