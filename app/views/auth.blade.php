@extends('layouts.formStyel')


@section('script')
@parent
	<!--add scripts for document -->
<script>
$(document).ready(function() {
    $('#orderForm').bootstrapValidator({
        fields: {
            customerName: {
                validators: {
                    notEmpty: {
                        // enabled is true, by default
                        message: 'The full name is required and cannot be empty'
                    },
                    stringLength: {
                        enabled: true,
                        min: 3,
                        max: 40,
                        message: 'The full name must be more than 8 and less than 40 characters long'
                    }
                }
            }
        }
    });
});
</script>	
@stop


@section('title')
Purchase Form Test
@stop

@section('jumbotron')
<h1>Hello {{Auth::user()->name;}}</h1>
@stop

@section('navigation')
        <li><a href="{{ URL::to('main') }}">Home</a></li>
@stop


@section('content')

<form method="POST" action="order" accept-charset="UTF-8" id="orderForm">
		    <div class="row">
				<div class="col-md-8 col-md-offset-2"> <!-- center a div-->
				<div class="well">



<!-- Add item radio group --> 
  <div class="form-group"><!-- Customer name text field -->
    <label for="formCustomer" class="col-sm-4 control-label">Customer Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="formCustomer" name="customerName" placeholder="Customer Name">
    </div>
  </div>
  <div class="form-group">
    <label for="formCName"" class="col-sm-4 control-label">Project Chinese Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="formCName" name="projectCName" placeholder="Project's Chinese name">
    </div>
  </div>
   <div class="form-group">
    <label for="formEName" class="col-sm-4 control-label">Project English Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="formEName" name="projectEName" placeholder="Project's English name">
    </div>
  </div>
<b>What kind of item do you want to purchase:</b><br>
  		<label class="radio-inline">
          <input type="radio" name="radioGroup" id="radio1" value="1" checked> Template
        </label>
        <label class="radio-inline">
          <input type="radio" name="radioGroup" id="radio2" value="2"> Domain Name
        </label>
        <label class="radio-inline">
          <input type="radio" name="radioGroup" id="radio3" value="3"> Enterprise Email
        </label>
		<label class="radio-inline">
          <input type="radio" name="radioGroup" id="radio4" value="4"> Plugin
        </label>
		<label class="radio-inline">
          <input type="radio" name="radioGroup" id="radio5" value="5"> Other
        </label>
											
				</div>
				</div>
			</div>


	<div class="row">
	<div class="col-md-8 col-md-offset-2"> <!-- center a div-->
	<div class="well">
	
	
	<!-- Form comment and submit -->
	<div class="row">
    <label for="requestDate" class="col-sm-4 control-label">Requested Date</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="requestDate" name="requestDate" readonly='readonly' value='<?php $now = new DateTime(); echo $now->format('Y-m-d');?>'>
    </div>

    <label for="totalPrice" class="col-sm-2 control-label">Total Price</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="totalPrice" readonly='readonly'>
    </div>
	</div>
	
	 <div class="row">
    <label for="comment" class="col-sm-2 control-label">Comment</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows = '5' id="comment" name="comment" placeholder="Description"></textarea>
    </div>
	<div class='col-md-12 text-center'>
	
	 <button type="submit" class="btn btn-default">Sign up</button>


	</div>
	</div>
    </div>
	
		</div>
    </div>
		{{ Form::close() }}
	
	
	
@stop

