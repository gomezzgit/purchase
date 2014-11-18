<?php

class AuthController extends BaseController {

   
	//show login
	public function showLogin()
	{
	
	
	// Check if we already logged in
    if (Auth::check())
    {
        // Redirect to homepage
      // return Redirect::to('pf');
    }	
	
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
            // we are now logged in, go to main page
            return Redirect::to('main');
		   //return View::make('purchaseForm')->with('name',$name);
        }
        else
        {
		
			// redirect
            Session::flash('message', 'username or password is incorrect');
            return Redirect::to('login');
        }
		
	}// end handleLogin
	
	
    public function getLogout()
    {
        // Log out
        Auth::logout();

        // Redirect to homepage
		Session::flash('message', 'You have logout successfully');
        return Redirect::to('login');
    }
	
	
}