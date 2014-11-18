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

	
	/**
     * show all order records
     *
     */
	public function showOrder()
	{
	
	    $order = Order::all();
		$template = Template::all();
		$domain = Domainname::all();
		$email = EnterpriseEmail::all();
		$plugin = Plugin::all();
		$other = Other::all();
		
		return View::make('orderlist')->with("order",$order)->with('template', $template)->with('domain',$domain)->with('email',$email)->with('plugin',$plugin)->with('other', $other);
	}
	
		
	/**
     * show order detail based on order id
     *
     */
	public function showOrderDetail($id)
	{
	
	    $order = Order::find($id);
		$template = Template::where('orderid','=',$order->id)->get();
		$domain = Domainname::where('orderid','=',$order->id)->get();
		$email = EnterpriseEmail::where('orderid','=',$order->id)->get();
		$plugin = Plugin::where('orderid','=',$order->id)->get();
		$other = Other::where('orderid','=',$order->id)->get();
		
		return View::make('order')->with("order",$order)->with('template', $template)->with('domain',$domain)->with('email',$email)->with('plugin',$plugin)->with('other', $other);
	}
	
	
	/**
     * show form of database
     *
     * @return Response
     */
	public function showForm(){
	
	$tableJSON = Input::get('tableData');//get the JSON of each form in the order	
	$form= json_decode($tableJSON,true);
	
	
	
	
	
	
	
	
	
	return View::make('try/formlist')->with("data",$form );
	
	}//end showForm
	
	
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
		
		$authorizer = Input::get('authorizerSelector');
		if($authorizer != 'none')
		$order->prefer_authorizer = $authorizer;
		
		$order->save();
		
		$this->storeForm($order->id);
		
		$message = "Order send successfully";
		
		// redirect
        Session::flash('message', $message );
        return Redirect::to('pf');
		
	}// end storeOrder
	
    /**
     * update modified order
     *
     */
	public function updateOrder()
	{
	
	    $id = Input::get('orderID');
		$state = Input::get('stateSelector');
		$final_price = Input::get('finalPrice');
	
	    //update current order
	    $order = Order::find($id);
		
		$order->state = $state;
		$order->final_price = $final_price*100 ;
		
		$order->save();
		
		$message = "Order ".$id." has been modified successfully";
        Session::flash('message', $message );
        return Redirect::to('main');
		
	}//end  updateOrder
	
	 /**
     * cancel submitted order
     *
     */
	public function cancelOrder()
	{
	
	    $id = Input::get('orderID');	
	
	    //update current order
	    $order = Order::find($id);		
		$order->state = 'cancel';		
		$order->save();
		
		$message = "Order ".$id." has been cancelled successfully";
        Session::flash('message', $message );
        return Redirect::to('main');
		
	}//end  cancelOrder
	
	
	/**
     * authorize submitted order
     *
     */
	public function authorizeOrder()
	{
	
	    $id = Input::get('orderID');	
	
	    //update current order
	    $order = Order::find($id);		
		$order->state = 'purchasing';		
		$order->authorised_by = Auth::user()->id;	
		$today = new DateTime();
		$order->authorised_at = $today->format('Y-m-d');	
		$order->save();
		
		$message = "Order ".$id." has been authorized successfully";
        Session::flash('message', $message );
        return Redirect::to('main');
		
	}//end  authorize 

	
	/**
     * store form into database
     *
     * @return Response
     */
	public function storeForm($orderid){
	
	$tableJSON = Input::get('tableData');//get the JSON of each form in the order	
	$formData = json_decode($tableJSON,true);
	
	
	foreach($formData as $key => $form){
	
//	if($form['Type'] == 'Template')
//	$this->storeTemplate($form, $orderid);
	
	
	switch ($form['Type']) {
	
	case 'Template':
	$this->storeTemplate($form, $orderid);
    break;
	
	case "DomainName":
    $this->storeDomainName($form, $orderid);
    break;
	
	case "EnterpriseEmail":
    $this->storeEnterpriseEmail($form, $orderid);
    break;
	
	case "Plugin":
    $this->storePlugin($form, $orderid);
    break;
	
	case "Other":
    $this->storeOtherForm($form, $orderid);
    break;
	}
		
	
	}//end foreach
	
	
	}//end storeForm
	
	
	/**
     * store template form into database
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
	$template->price = $array['Price']*100;
	
	$template->save();
		
	}//end storeTemplate
	
	/**
     * store domain name form into database
     *
     */
	public function storeDomainName($array, $orderid){
	
	//store
	$domain = new Domainname;
	$domain->orderid = $orderid;
	$domain->type = 'DomainName';
	$domain->name = $array['Domain Name'];
	$domain->serviceYear = $array['Service Year'];
	$domain->description = $array['Description'];
	$domain->price = $array['Price']*100;
	
	$domain->save();
		
	}//end storeDomainName
		
		
	/**
     * store enterprise email form into database
     *
     */
	public function storeEnterpriseEmail($array, $orderid){
	
	//store
	$email = new Enterpriseemail;
	$email->orderid = $orderid;
	$email->type = 'EnterpriseEmail';
	$email->name = $array['Domain Name'];
	$email->provider = $array['Provider'];
	$email->storage = $array['Storage'];
	$email->accountNumber = $array['Account Number'];
	$email->serviceYear = $array['Service Year'];
	$email->description = $array['Description'];
	$email->price = $array['Price']*100;
	
	$email->save();
		
	}//end storeEnterpriseEmail
	
	/**
     * store plugin form into database
     *
     */
	public function storePlugin($array, $orderid){
	
	//store
	$plugin = new Plugin;
	$plugin->orderid = $orderid;
	$plugin->type = 'Plugin';
	$plugin->demoURL = $array['Demo URL'];
	$plugin->orderURL = $array['Order URL'];
	$plugin->description = $array['Description'];
	$plugin->price = $array['Price']*100;
	
	$plugin->save();
		
	}//end storePlugin
	
	/**
     * store other type form into database
     *
     */
	public function storeOtherForm($array, $orderid){
	
	//store
	$other = new Other;
	$other->orderid = $orderid;
	$other->type = 'Other';
	$other->demoURL = $array['Demo URL'];
	$other->description = $array['Description'];
	$other->price = $array['Price']*100;
	
	$other->save();
		
	}//end storeOtherForm
	
	/**
     * show order modify page
     *
     */
	public function orderModifyPage($id)
	{
	
	    $order = Order::find($id);
		$requester = User::find($order->requested_by)->name;
		$template = Template::where('orderid','=',$order->id)->get();
		$domain = Domainname::where('orderid','=',$order->id)->get();
		$email = EnterpriseEmail::where('orderid','=',$order->id)->get();
		$plugin = Plugin::where('orderid','=',$order->id)->get();
		$other = Other::where('orderid','=',$order->id)->get();
		
		$data = array(
				'order'  => $order,
				'template'   => $template,
				'domain' => $domain ,
				'email' => $email,
				'plugin' => $plugin,
				'other' => $other,
				'requester' => $requester
		);
		
		return View::make('modify')->with("order",$order)->with('template', $template)->with('domain',$domain)->with('email',$email)->with('plugin',$plugin)->with('other', $other)->with('requester',$requester);
	//	return View::make('modify')->with('data',$data);
	}//end  modifuOrder
	
	
	/**
     * show order authorize page
     *
     */
	public function orderAuthorizePage($id)
	{
	
	    $order = Order::find($id);
		$requester = User::find($order->requested_by)->name;
		$template = Template::where('orderid','=',$order->id)->get();
		$domain = Domainname::where('orderid','=',$order->id)->get();
		$email = EnterpriseEmail::where('orderid','=',$order->id)->get();
		$plugin = Plugin::where('orderid','=',$order->id)->get();
		$other = Other::where('orderid','=',$order->id)->get();
		
		return View::make('authorize')->with("order",$order)->with('template', $template)->with('domain',$domain)->with('email',$email)->with('plugin',$plugin)->with('other', $other)->with('requester',$requester);

	}//end  modifuOrder
	
	
	
	}
