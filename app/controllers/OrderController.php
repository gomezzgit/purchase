<?php

class OrderController extends BaseController {

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

	
	public function showOrder()
	{
	
	    $order = Order::all();
		$template = Template::all();
		
		return View::make('orderlist')->with("order",$order)->with('template', $template);
	}
	
	 /**
     * restore order into database
     *
     * @return Response
     */
	public function storeOrder()
	{
	    //store
	    $order = new Order;
		$order->customer_name = Input::get('customerName');
		$order->chinese_name = Input::get('projectCName');
		$order->english_name = Input::get('projectEName');
		$order->state = 'waiting';
		$order->requested_at = Input::get('requestDate');
		$order->requested_by = Auth::user()->id;
		$order->comment = Input::get('comment');	
		$order->save();
		
		$this->storeForm($order->id);
		
		
		// redirect
        Session::flash('message', 'Successfully send order!');
        return Redirect::to('pf');
		
	}// end storeOrder
	
	 /**
     * show form of database
     *
     * @return Response
     */
	public function showForm(){
	
	$tableJSON = Input::get('tableData');//get the JSON of each form in the order	
	$form= json_decode($tableJSON,true);
	
	
	
	
	
	
	
	
	
	return View::make('try/formlist')->with("data",$form);
	
	}//end showForm

	
	/**
     * store form into database
     *
     * @return Response
     */
	public function storeForm($orderid){
	
	$tableJSON = Input::get('tableData');//get the JSON of each form in the order	
	$formData = json_decode($tableJSON,true);
	
	
	foreach($formData as $key => $form){
	
	if($form['Type'] == 'Template')
	$this->storeTemplate($form, $orderid);
	}
	
	
	}//end storeForm
	
	
	/**
     * store template form into template table
     *
     */
	public function storeTemplate($array, $orderid){
	
	//store
	$template = new Template;
	$template->orderid = $orderid;
	$template->type = 'Template';
	$template->demoURL = $array['Demo URL'];
	$template->orderURL = $array['Order URL'];
	$template->description = $array['Description'];
	$template->price = $array['Price'];
	
	$template->save();
		
	}//end storeTemplate
		
	
	}
