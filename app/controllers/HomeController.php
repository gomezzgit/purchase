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
	
	/*
	*show user's main page
	*/
	
	public function showMainpage()
	{
	    		
		//list all order based on user id
		$orderList = Order::where('requested_by','=',Auth::user()->id)->get();
		
		if(Auth::user()->authority =='admin'){
		
		//if user is admin, return all orders
		$orders = Order::all();
		
		//find requester and authorizer name based on id
		foreach($orders as $k => $v){
		
		$requester = User::find($v->requested_by);
		$v->requested_by = $requester->name;	
			
		if($v->prefer_authorizer != ''){
		$authorizer = User::find($v->prefer_authorizer);	
		$v->prefer_authorizer = $authorizer->name;}
		
		}		
		
		return View::make('main')->with("orderList",$orderList)->with('orders',$orders);
		
		}
		else if(Auth::user()->authority =='manager'){
		
		//return requester's orderlist to manager
		$requested = Order::where('prefer_authorizer','=',Auth::user()->id)->get();
		
		//find requester name based on id
		foreach($requested as $k => $v){
		
		$requester = User::find($v->requested_by);
		$v->requested_by = $requester->name;	
		
		}
		
		return View::make('main')->with("orderList",$orderList)->with('requested',$requested);
		
		}
		else
		return View::make('main')->with("orderList",$orderList);
	}
	
	/*
	*show order page that user can send order to purchase products
	*/
	public function showOrderPage()
	{
	    $user = User::where('authority','=','manager')->get();
		
		return View::make('purchaseForm')->with('user',$user);	
	}
	
	
	/*
	*show domain page to demonstrate all the domain list
	*/
	public function showDomainPage()
	{
	    $domain = Domainname::all();
		
		return View::make('domain')->with('domain',$domain);	
	}
	
	
	}
