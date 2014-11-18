@extends('layouts.default')

@section('script')
@parent
<script>
	$(document).ready(function(){
	
	//hide div if the table is empty
	if($("#myOrderTable tr").length ==1)
	$('#myOrderList').hide();
	
	if($("#myFinishedOrderTable tr").length ==1)
	$('#myFinishedOrderList').hide();
	
	if($("#allOrderTable tr").length ==1)
	$('#allOrderList').hide();

	if($("#finishedOrderTable tr").length ==1)
	$('#finishedOrderList').hide();	
	
	/*
	*build datatable
	*/
	$('#myOrderTable').dataTable({

          "iDisplayLength": 10
	});
	
	$('#myFinishedOrderTable').dataTable({

          "iDisplayLength": 5
	});
	
	$('#allOrderTable').dataTable({

          "iDisplayLength": 10
	});
	
	$('#finishedOrderTable').dataTable({

          "iDisplayLength": 5
	});
	
	
	});//end document.ready
</script>
@stop

@section('title')
Form List
@stop

@section('navigation_right')
<li><a href="#">Hello,{{Auth::user()->name}}</a></li>		
@stop	

@section('jumbotron')
<h1>Order List</h1>
@stop



@section('content')


    <div class="container">	

	<!-- will be used to show any messages -->
	@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	
	<!-- show user's order list-->	
	<div class="row" id="myOrderList">
	<fieldset>
	<legend>My Order List</legend>
		<div class="col-md-12"> <!-- center a div-->
			<div class="well">
			<!--Show submitted order list -->

	<table id='myOrderTable' class='table table-bordered'>
		<thead>
        <tr>
		<th>Order id</th>
		<th>Cusomter name</th>
		<th>Project Chinese name</th>
		<th>Project English name</th>
		<th>State</th>
		<th>Requested date</th>
		<th>Action</th>
		</tr>
		</thead>
		
		<tbody>
		@foreach($orderList as $key => $value)
		@if($value->state !='finished')
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->customer_name}}</td>
            <td>{{ $value->chinese_name }}</td>
            <td>{{ $value->english_name }}</td>
			<td>{{ $value->state }}</td>
			<td>{{ $value->requested_at }}</td>
            <!-- Add show detail hyper link -->
            <td>
              <!-- show the order detail -->
              <a href="{{ URL::to('show/' . $value->id) }}">Detail</a>         
            </td>
        </tr>
		@endif
		@endforeach
		</tbody>
	</table>

			</div>
		</div>
	</fieldset>
	</div>
	
	<!--show finished order list -->
	<div class="row" id="myFinishedOrderList">
	<fieldset>
	<legend>My Finished Order List</legend>
		<div class="col-md-12 col-md-offset-0"> <!-- center a div-->
		<div class="well">
	    <!-- Form List Content -->
		 
		<table id='myFinishedOrderTable' class='table table-bordered'>
		<thead>
        <tr>
		<th>Order id</th>
		<th>Cusomter name</th>
		<th>Project Chinese name</th>
		<th>Project English name</th>
		<th>State</th>
		<th>Requested date</th>
		<th>Action</th>
		</tr>
		</thead>
		
		<tbody>
		@foreach($orderList as $key => $value)
		@if($value->state =='finished')
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->customer_name}}</td>
            <td>{{ $value->chinese_name }}</td>
            <td>{{ $value->english_name }}</td>
			<td>{{ $value->state }}</td>
			<td>{{ $value->requested_at }}</td>
            <!-- Add show detail hyper link -->
            <td>
              <!-- show the order detail -->
              <a href="{{ URL::to('show/' . $value->id) }}">Detail</a>         
            </td>
        </tr>
		@endif
		@endforeach
		</tbody>
		
		</table>
	
	</div>
	</div>
	</fieldset>
	</div> 
	<!-- ./finished order list -->
		
	@if (Auth::user()->authority =='admin')
    <!-- show all order list if user is admin --> 
	<div class="row" id="allOrderList">
	<fieldset>
	<legend>All Order List</legend>
		<div class="col-md-12 col-md-offset-0"> <!-- center a div-->
		<div class="well">
	    <!-- Form List Content -->
		 
		<table id='allOrderTable' class='table table-bordered'>
		<thead>
        <tr>
		<th>Order id</th>
		<th>Cusomter name</th>
		<th>Project Chinese name</th>
		<th>Project English name</th>
		<th>State</th>
		<th>Requested date</th>
		<th>Requested by</th>
		<th>Prefer Authorizer</th>
		<th>Final Price</th>
		<th>Action</th>
		</tr>
		</thead>
		
		<tbody>
		@foreach($orders as $key => $value)
		@if($value->state !='finished')
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->customer_name}}</td>
            <td>{{ $value->chinese_name }}</td>
            <td>{{ $value->english_name }}</td>
			<td>{{ $value->state }}</td>
			<td>{{ $value->requested_at }}</td>
			<td>{{ $value->requested_by }}</td>
			<td>{{ $value->prefer_authorizer }}</td>
			<td>{{ $value->final_price/100 }}</td>
            <!-- Add show detail hyper link -->
            <td>
              <!-- show the order detail -->
              <a href="{{ URL::to('modify/' . $value->id) }}">Modify</a>         
            </td>
        </tr>
		@endif
		@endforeach
		</tbody>
		
		</table>
	
	</div>
	</div>
	</fieldset>
	</div> 
	
	
    <!-- show all order list if user is admin --> 
	<div class="row" id="finishedOrderList">
	<fieldset>
	<legend>Finished Order List</legend>
		<div class="col-md-12 col-md-offset-0"> <!-- center a div-->
		<div class="well">
	    <!-- Form List Content -->
		 
		<table id='finishedOrderTable' class='table table-bordered'>
		<thead>
        <tr>
		<th>Order id</th>
		<th>Cusomter name</th>
		<th>Project Chinese name</th>
		<th>Project English name</th>
		<th>State</th>
		<th>Requested date</th>
		<th>Requested by</th>
		<th>Prefer Authorizer</th>
		<th>Final Price</th>
		<th>Action</th>
		</tr>
		</thead>
		
		<tbody>
		@foreach($orders as $key => $value)
		@if($value->state =='finished')
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->customer_name}}</td>
            <td>{{ $value->chinese_name }}</td>
            <td>{{ $value->english_name }}</td>
			<td>{{ $value->state }}</td>
			<td>{{ $value->requested_at }}</td>
			<td>{{ $value->requested_by }}</td>
			<td>{{ $value->prefer_authorizer }}</td>
			<td>{{ $value->final_price/100 }}</td>
            <!-- Add show detail hyper link -->
            <td>
              <!-- show the order detail -->
             <a href="{{ URL::to('show/' . $value->id) }}">Detail</a>            
            </td>
        </tr>
		@endif
		@endforeach
		</tbody>
		
		</table>
	
	</div>
	</div>
	</fieldset>
	</div> 
	<!-- ./finished order list-->
	
	<!-- ./all order list div -->		
	@elseif(Auth::user()->authority =='manager')
	<div class="row" id="requestedOrderList">
	<fieldset>
	<legend>Requested Order List</legend>
		<div class="col-md-12 col-md-offset-0"> <!-- center a div-->
		<div class="well">
	    <!-- Form List Content -->
		 
		<table id='requestedOrderTable' class='table table-bordered'>
		<thead>
        <tr>
		<th>Order id</th>
		<th>Cusomter name</th>
		<th>Project Chinese name</th>
		<th>Project English name</th>
		<th>State</th>
		<th>Requested date</th>
		<th>Requested by</th>
		<th>Final Price</th>
		<th>Action</th>
		</tr>
		</thead>
		
		<tbody>
		@foreach($requested as $key => $value)
		@if($value->state !='finished')
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->customer_name}}</td>
            <td>{{ $value->chinese_name }}</td>
            <td>{{ $value->english_name }}</td>
			<td>{{ $value->state }}</td>
			<td>{{ $value->requested_at }}</td>
			<td>{{ $value->requested_by }}</td>
			<td>{{ $value->final_price/100 }}</td>
            <!-- Add show detail hyper link -->
            <td>
              <!-- show the order detail -->
              <a href="{{ URL::to('authorize/' . $value->id) }}">Authorize</a>         
            </td>
        </tr>
		@endif
		@endforeach
		</tbody>
		
		</table>
	
	</div>
	</div>
	</fieldset>
	</div> 
	<!-- ./all order list div -->		
	
	
	@endif		
			
			
		</div><!-- ./container -->

        <div class="container">		
		
		    <div class="row">
				<div class="col-md-4 col-md-offset-4"> <!-- center a div-->
				<div class="well">
				<!--Add Content -->
				<button class="btn btn-info" onclick="window.location='{{ URL::to('pf') }}'">Create New Order</button>
				</div>
				</div>
			</div>
			
		</div>
@stop
