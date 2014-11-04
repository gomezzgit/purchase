@extends('layouts.formStyel')


@section('script')
@parent
	<!--add scripts for document -->
	<script>
	$(document).ready(function(){
	
	var editTag = 'new'; //new form or change old form
	var formIndex = -1; //form index
		
	//set the function of add item buttion
	$(".addButton").click(function(){

	editTag = 'new'; // to add a new form
	
	//get radio group selected value
	$option = $("input:radio[name='radioGroup']:checked").val();
	
	if($option == 3)
	$('#enterpriseEmailModal').modal();
    else
    $('#templateModal').modal();
	
	});
	
	//set the function of save form button on every modal
	$(".formSave").click(function(){
	

	
	
	
	
	
	
	//get radio group selected value
	$option = $("input:radio[name='radioGroup']:checked").val();
	
    var type ='';
	var info = '';
	var price = 0;

	if($option == 3){
	
	type ='Enterprise';
	var cName = $("#enterpriseEmailForm").find('input[id="formCustomer"]').val();

	
	price = $("#enterpriseEmailForm").find('input[id="price"]').val();
	
	info = cName;
	
	}
    else{
	
    type ='Template';
	
	//var CName = $("#templateForm").find('input[id="formCustomer"]').val();
	//var pCName = $("#templateForm").find('input[id="formCName"]').val();
	//var pEName = $("#templateForm").find('input[id="formEName"]').val();
	var demoURL = $("#templateForm").find('input[id="demoURL"]').val();
	var orderURL = $("#templateForm").find('input[id="orderURL"]').val();
	var description = $("#templateForm").find('textarea#description').val();
	
	price = $("#templateForm").find('input[id="price"]').val();
	
	//alert("description: "+description);
	
	}
	
	

	
	
	if(editTag =='new'){
	//add new row to form table
	
	var formValue = "<tr><td>"+demoURL+"</td>"+
	"<td>"+orderURL+"</td>"+
	"<td>"+description+"</td>"+
	"<td>"+price+"</td>"+
	"<td><button type='button' class='edit btn-info'>Edit</button>"+
	"<button type='button' class='delete btn-info'>Delete</button></td>"+
	"</tr>";
	
	
	 //add a new row based on the form
	$('#formListTable tbody').append(formValue);
	
	//prevent fire several times
	$(".edit").unbind('click').bind("click", Edit);
	$(".delete").unbind('click').bind("click", Delete);
	}else{
	//change old form 
	
	$('#formListTable tr').eq(formIndex+1).find('td:eq(0)').text(demoURL);
	$('#formListTable tr').eq(formIndex+1).find('td:eq(1)').text(orderURL);
	$('#formListTable tr').eq(formIndex+1).find('td:eq(2)').text(description);
	$('#formListTable tr').eq(formIndex+1).find('td:eq(3)').text(price);
	
	//alert($('#formListTable tr').eq(formIndex+1).find('td:eq(1)').text());
	
	}
	
	//hide the modal after saving the form
	$(".modal").modal('hide'); //hide modal
	
	//reset modal
	$('.modal').on('hidden.bs.modal', function(){
    $(this).find('form')[0].reset();
	$('#templateForm').bootstrapValidator('resetForm', true);
    });
	
	
	//renew the total price
	totalPrice();
	
	});// end formSave function
	
	
	//set function of submit button
	$("#submit").click(function(){
	
	alert('hello world');
	
	});// end submit button
	
	
	
	
	
	
	
	
   $(".formCancel").click(function(){
	
	//reset modal
	$('.modal').on('hidden.bs.modal', function(){
    $(this).find('form')[0].reset();
	$('#templateForm').bootstrapValidator('resetForm', true);
    });
	
	});// end formCnacel button
	
	//build validator for template form   
	$('#templateForm').bootstrapValidator({
				excluded: [':disabled'],
        fields: {
            dURL: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    }
                }
            },
            oURL: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    }
                }
            },			
			projectPrice: {
                validators: {
                    notEmpty: {
                        message: 'The price is required'
                    },
                    numeric: {
                        message: 'The price must be a number'
                    }
                }
            }

        }
    });//end template form validation
	
	
	//add edit function for edit button on  formListTable
	function Edit(){
	
	editTag = 'old';// change old form
	
	//get current row and column number
	var row = $(this).closest("tr").index()+1;
	var col = $(this).closest("td").index()+1;
	
	//get the type of this table
	var type = $(this).closest("div").attr('id');
	
	//get the value of first cell in this table, namely the demo URL
	var dURL = $(this).closest('tr').find('td:eq(0)').text();
	
	//get the value of second cell in this table, namely the order URL
	var oURL = $(this).closest('tr').find('td:eq(1)').text();
	
	//get the value of third cell in this table, namely description
	var description = $(this).closest('tr').find('td:eq(2)').text();
	
	//get the value of third cell in this table, namely the price
	var price = $(this).closest('tr').find('td:eq(3)').text();
	
    if(type == "enterpriseDiv"){
	$('#enterpriseEmailModal').modal();
	$("#enterpriseEmailForm").find('input[id="formCustomer"]').val(info);
	$("#enterpriseEmailForm").find('input[id="price"]').val(price);
	
	}else{
	
    $('#templateModal').modal();
	$("#templateForm").find('input[id="demoURL"]').val(dURL);
	$("#templateForm").find('input[id="orderURL"]').val(oURL);
	$("#templateForm").find('textarea[id="description"]').val(description);
	$("#templateForm").find('input[id="price"]').val(price);	
	}
	
	formIndex = $(this).closest("tr").index();
	alert('Row: ' + formIndex);
	
	}//end Edit funtion
	
	//add delete function for delete button on  formListTable
	function Delete(){
	
	var par = $(this).parent().parent(); //tr
	par.remove();
	totalPrice();
	}
	
	//re-calculate the total price
	totalPrice();
		
	});
	
	
	
	//get the total price
	function totalPrice(){
	
	var total = 0 
	
	$('#formListTable tr').each(function() { 
	$(this).find('td:eq(3)').each(function(){ 
	total  += parseFloat($(this).text()); 
	}); 
	}); 
	
	$("#totalPrice").val(total);
	
	}//end totalPrice()
	
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


       
		
		    <div class="row">
				<div class="col-md-8 col-md-offset-2"> <!-- center a div-->
				<div class="well">
				<!--Add Form Content -->
				


	
<!-- build a form -->
{{ Form::open(array('url' => 'order')) }}


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
	<!-- Button trigger modal -->      
<!-- <button id='addButton' class="btn btn-info">Add Item</button> -->
{{ Form::button('Add item', array('class' => 'addButton btn-info')) }}
											
				</div>
				</div>
			</div>



	<div id="templateDiv"  class="row">
		<div class="col-md-10 col-md-offset-1"> <!-- center a div-->
		<div class="well">
	    <!-- Form List Content -->
		<table id='formListTable' name="formListTable" class='table table-bordered'>
		<thead>
		<tr>
			<th>Demo URL</th>
			<th>Order URL</th>
			<th>Description</th>
			<th>Price</th>
			<th>Action</th>
			
		</tr>
		</thead>
		
		<tbody>
		</tbody>
		
		</table>
	
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
      <input type="text" class="form-control" id="requestDate" readonly='readonly' value='<?php $now = new DateTime(); echo $now->format('Y-m-d');?>'>
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
    <!-- <button id='submit' class='btn btn-info'>Submit </button> -->
	
	{{ Form::submit('Create the Nerd!', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
	</div>
    </div>				
				
	</div>
	</div>
    </div>
	
	

<!-- Template Modal -->
<div class="modal fade" id="templateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Purchase Form--Template</h4>
      </div>
      <div class="modal-body">
       
	   
<form id = "templateForm" class="form-horizontal" role="form">

  <div class="form-group">
    <label for="demoURL" class="col-sm-4 control-label">Demo URL</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="demoURL" name='dURL' placeholder="Input URL">
    </div>
  </div>
  <div class="form-group">
    <label for="orderURL" class="col-sm-4 control-label">Order URL</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="orderURL"  name='oURL' placeholder="Input URL">
    </div>
  </div>
   <div class="form-group">
    <label for="description" class="col-sm-4 control-label">Description</label>
    <div class="col-sm-8">
      <textarea class="form-control" rows = '3' id="description" placeholder="Description"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="price" class="col-sm-4 control-label">Price</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="price" name="projectPrice" placeholder="Input price">
    </div>
  </div>

</form>
   
      </div>
      <div class="modal-footer">
	   <button type="button"  class="formSave btn-primary" >Save Form</button>
       <button type="button" class="formCancel btn-default" data-dismiss="modal">Cancel</button>      
      </div>
	  
    </div>
  </div>
</div>
<!-- /.Template Modal -->

<!-- Enterprise Email Modal -->
<div class="modal fade" id="enterpriseEmailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Purchase Form--Enterprise Email</h4>
      </div>
      <div class="modal-body">
       
	   
<form id = "enterpriseEmailForm" class="form-horizontal" role="form">


  <div class="form-group">
    <label for="domainName" class="col-sm-4 control-label">Domain Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="domainName" placeholder="Domain">
    </div>
  </div>
  <div class="form-group">
    <label for="provider" class="col-sm-4 control-label">Provider</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="provider" placeholder="provider">
    </div>
  </div>
   <div class="form-group">
    <label for="storage" class="col-sm-4 control-label">Storage</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="storage" placeholder="storage">
    </div>
  </div>
    <div class="form-group">
    <label for="accountAmount" class="col-sm-4 control-label">Account amount</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="accountAmount" placeholder="How many accounts do you want">
    </div>
  </div>
  <div class="form-group">
    <label for="serviceYear" class="col-sm-4 control-label">Year of service</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="serviceYear" placeholder="How many years do you want">
  </div>
  </div>
   <div class="form-group">
    <label for="description" class="col-sm-4 control-label">Description</label>
    <div class="col-sm-8">
      <textarea class="form-control" rows = '3' id="description" placeholder="Description"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="price" class="col-sm-4 control-label">Price</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="price" placeholder="Input price">
    </div>
  </div>

</form>
   
      </div>
      <div class="modal-footer">
	   <button type="button" class="formSave btn-primary">Save Form</button>
       <button type="button" class="formCancel btn-default" data-dismiss="modal">Cancel</button>      
      </div>
	  
    </div>
  </div>
</div>
<!-- /.Enterprise Email Modal -->
	
	
	


@stop

