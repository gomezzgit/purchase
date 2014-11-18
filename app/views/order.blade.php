@extends('layouts.formStyel')


@section('script')
@parent
	<!--add scripts for document -->
	<script>
		
	$(document).ready(function(){
	
	totalPrice();
	
	if($("#templateFormListTable tr").length ==1)
	$('#templateListDiv').hide();
	
	if($("#domainNameFormListTable tr").length ==1)
	$('#domainNameListDiv').hide();
	
	if($("#enterpriseEmailFormListTable tr").length ==1)
	$('#enterpriseEmailListDiv').hide();
	
	if($("#pluginFormListTable tr").length ==1)
	$('#pluginListDiv').hide();

	if($("#otherTypeFormListTable tr").length ==1)
	$('#otherTypeListDiv').hide();	
	
	});	
	
	
	//get the total price
	function totalPrice(){
	
	var total = 0 
	
	//total price of template
	$('#templateFormListTable tr').each(function() { 
	$(this).find('td:eq(3)').each(function(){ 
	total  += parseFloat($(this).text()); 
	}); 
	}); 
	
	//total price of domain name
	$('#domainNameFormListTable tr').each(function() { 
	$(this).find('td:eq(3)').each(function(){ 
	total  += parseFloat($(this).text()); 
	}); 
	}); 
	
	
	//total price of enterprise email name
	$('#enterpriseEmailFormListTable tr').each(function() { 
	$(this).find('td:eq(6)').each(function(){ 
	total  += parseFloat($(this).text()); 
	}); 
	}); 
	
	//total price of plugins name
	$('#pluginFormListTable tr').each(function() { 
	$(this).find('td:eq(3)').each(function(){ 
	total  += parseFloat($(this).text()); 
	}); 
	}); 
	
	//total price of plugins name
	$('#otherTypeFormListTable tr').each(function() { 
	$(this).find('td:eq(2)').each(function(){ 
	total  += parseFloat($(this).text()); 
	}); 
	}); 
	
	total = total.toFixed(2);
	$("#totalPrice").val(total);
	
	}//end totalPrice()
	</script>
@stop


@section('title')
Order Detail
@stop

@section('jumbotron')
<h1>Order {{$order->id}} Detail</h1>
@stop

@section('navigation')
        <li><a href="{{ URL::to('main') }}">Main</a></li>
		<li><a href="{{ URL::to('pf') }}">Create Order</a></li>
@stop


@section('content')


       	
       	
	<div class="row">
		<div class="col-md-8 col-md-offset-1"> <!-- center a div-->
		

  <div class="form-group"><!-- Customer name text field -->
    <label for="formCustomer" class="col-sm-4 control-label">Customer Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="formCustomer" name="customerName" value="{{ $order->customer_name}}" readonly="readonly">
    </div>
  </div>
  <div class="form-group">
    <label for="formCName"" class="col-sm-4 control-label">Project Chinese Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="formCName" name="projectCName" value="{{ $order->chinese_name}}" readonly="readonly">
    </div>
  </div>
   <div class="form-group">
    <label for="formEName" class="col-sm-4 control-label">Project English Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="formEName" name="projectEName" value="{{ $order->english_name}}" readonly="readonly">
    </div>
  </div>
	<div class="form-group">
    <label for="formState" class="col-sm-4 control-label">Current State</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="formState" name="formState" value="{{ $order->state}}" readonly="readonly">
    </div>
  </div>					
			
				</div>
			</div>


    <!-- Template Form div --> 

	<div class="row" id="templateListDiv">
	<fieldset>
	<legend>Template Form List</legend>
		<div class="col-md-10 col-md-offset-1"> <!-- center a div-->
		<div id="templateDiv" class="well">
	    <!-- Form List Content -->
		 
		<table id='templateFormListTable' class='table table-bordered'>
		<thead>
		<tr>		
			<th>Demo URL</th>
			<th>Order URL</th>
			<th>Description</th>
			<th>Price</th>
			
		</tr>
		</thead>
		
		<tbody>
		@foreach($template as $key => $value)
        <tr>
            <td><a href='{{ $value->demoURL}}' target='_blank'>{{ $value->demoURL}}</a></td>
            <td>{{ $value->orderURL }}</td>
            <td>{{ $value->description }}</td>
			<td>{{ $value->price/100 }}</td>
        </tr>
		@endforeach		
		</tbody>
		
		</table>
	
		</div>
		</div>
	</fieldset>
	</div> <!-- ./Template Form div --> 

	

    <!-- Domain Name Form div --> 
	<div  class="row" id='domainNameListDiv'>
	<fieldset>
	<legend>Domain Name Form List</legend>
		<div class="col-md-10 col-md-offset-1"> <!-- center a div-->
		<div id='domainNameDiv' class="well">
	    <!-- Form List Content -->
		<table id='domainNameFormListTable' class='table table-bordered'>
		<thead>
		<tr>
			<th>Domain Name</th>
			<th>Service Year</th>
			<th>Description</th>
			<th>Price</th>
			
		</tr>
		</thead>
		
		<tbody>
		@foreach($domain as $key => $value)
        <tr>
           <td><a href='{{ $value->name}}' target='_blank'>{{ $value->name}}</a></td>
            <!--if service year is -1, it mean unlimited -->
			@if($value->serviceYear == -1)
			<td>Unlimited</td>
			@else
            <td>{{ $value->serviceYear }}</td>
			@endif
            <td>{{ $value->description }}</td>
			<td>{{ $value->price/100 }}</td>
        </tr>
		@endforeach	
		</tbody>
		
		</table>
	
	</div>
	</div>
	</fieldset>
	</div> <!-- ./Domain Name Form div--> 
	
	<!-- Enterprise Email Form div --> 
	
	<div  class="row" id="enterpriseEmailListDiv">
	<fieldset>
	<legend>Enterprise Email Form List</legend>
		<div class="col-md-10 col-md-offset-1"> <!-- center a div-->
		<div id="enterpriseEmailDiv" class="well">
	    <!-- Form List Content -->
		<table id='enterpriseEmailFormListTable' class='table table-bordered'>
		<thead>
		<tr>
			<th>Domain Name</th>
			<th>Provider</th>
			<th>Storage</th>
			<th>Account Number</th>
			<th>Service Year</th>
			<th>Description</th>
			<th>Price/</th>
			
		</tr>
		</thead>
		
		<tbody>
		@foreach($email as $key => $value)
        <tr>
            <td><a href='{{ $value->name}}' target='_blank'>{{ $value->name}}</a></td>
			<td>{{ $value->provider}}</td>
						<!--if value is -1, it mean unlimited -->
			@if($value->storage == -1)
			<td>Unlimited</td>
			@else
            <td>{{ $value->storage }}</td>
			@endif
			
			<!--if value is -1, it mean unlimited -->
			@if($value->accountNumber == -1)
			<td>Unlimited</td>
			@else
            <td>{{ $value->accountNumber }}</td>
			@endif
			
            <!--if value is -1, it mean unlimited -->
			@if($value->serviceYear == -1)
			<td>Unlimited</td>
			@else
            <td>{{ $value->serviceYear }}</td>
			@endif
			
            <td>{{ $value->description }}</td>
			<td>{{ $value->price/100 }}</td>
        </tr>
		@endforeach			
		</tbody>
		
		</table>
	
	</div>
	</div>
	</fieldset>
	</div> 
	<!-- ./Enterprise Email Form div--> 
	
	<!-- Plugins Form div --> 
	<div class="row" id="pluginListDiv">
	<fieldset>
	<legend>Plugins Form List</legend>	
		<div class="col-md-10 col-md-offset-1"> <!-- center a div-->
		<div id="pluginDiv"  class="well">
	    <!-- Form List Content -->
		 
		<table id='pluginFormListTable' class='table table-bordered'>
		<thead>
		<tr>
			<th>Demo URL</th>
			<th>Order URL</th>
			<th>Description</th>
			<th>Price/100</th>			
		</tr>
		</thead>
		
		<tbody>
		@foreach($plugin as $key => $value)
        <tr>
            <td><a href='{{ $value->demoURL}}' target='_blank'>{{ $value->demoURL}}</a></td>
            <td>{{ $value->orderURL }}</td>
            <td>{{ $value->description }}</td>
			<td>{{ $value->price/100 }}</td>
        </tr>
		@endforeach			
		</tbody>
		
		</table>
	
	</div>
	</div>
	</fieldset>
	</div> <!-- ./Plugins Form div --> 

	
	<!-- Plugins Form div --> 	
	<div class="row"  id="otherTypeListDiv">
	<fieldset>
	<legend>Other Form List</legend>	
		<div class="col-md-10 col-md-offset-1"> <!-- center a div-->
		<div id="otherTypeDiv" class="well">
	    <!-- Form List Content -->
		 
		<table id='otherTypeFormListTable' class='table table-bordered'>
		<thead>
		<tr>
			<th>Demo URL</th>
			<th>Description</th>
			<th>Price</th>			
		</tr>
		</thead>
		
		<tbody>
		@foreach($other as $key => $value)
        <tr>
            <td><a href='{{ $value->demoURL}}' target='_blank'>{{ $value->demoURL}}</a></td>
            <td>{{ $value->description }}</td>
			<td>{{ $value->price/100 }}</td>
        </tr>
		@endforeach			
		</tbody>
		
		</table>
	
	</div>
	</div>
	</fieldset>
	</div> <!-- ./Plugins Form div --> 

	<div class="row">
	<div class="col-md-8 col-md-offset-2"> <!-- center a div-->
	<div class="well">
	

	
	<!-- Form comment and submit -->
	<div class="row">
    <label for="requestDate" class="col-sm-4 control-label">Requested Date</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="requestDate" name="requestDate" readonly='readonly' value='{{$order->requested_at}}'>
    </div>

    <label for="totalPrice" class="col-sm-2 control-label">Total Price</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="totalPrice" readonly='readonly'>
    </div>
	</div>
	
	 <div class="row">
    <label for="comment" class="col-sm-2 control-label">Comment</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows = '5' id="comment" name="comment" readonly="readonly">{{$order->comment}}</textarea>
    </div>
	<div class='col-md-12 text-center'>	
	
	<!-- build a form -->
	{{ Form::open(array('url' => 'cancelOrder', 'id'=>'orderForm')) }} 
	{{ Form::hidden('orderID',"$order->id", array('id' => 'orderID')) }}

	<!--only not finished order can be cancelled -->
	@if($order->state !='finished')
	{{ Form::submit('Cancel Order', array('class' => 'btn btn-info')) }}
	<button type="button" class="btn btn-info" onclick="window.location='{{ url('main') }}'">Back to List</button>
	@else
	<button type="button"  class="btn btn-info" onclick="window.location='{{ url('main') }}'">Back to List</button>
	@endif
	</div>
    </div>				
				
	</div>
	</div>
    </div>
	{{ Form::close() }} <!-- close form -->
	


@stop

