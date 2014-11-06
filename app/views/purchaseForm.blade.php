@extends('layouts.formStyel')


@section('script')
@parent
	<!--add scripts for document -->
	<script>
	$(document).ready(function(){
	
	var editTag = 'new'; //new form or change old form
	var formIndex = -1; //form index
	var typeTag = 'template';  //which form modal will be shown
		
	//set the function of add item buttion
	$(".addButton").click(function(){

	editTag = 'new'; // to add a new form
	
	//get radio group selected value
	var option = $("input:radio[name='radioGroup']:checked").val();
	
//	if($option == 3)
//	$('#enterpriseEmailModal').modal();
 //   else
 //   $('#templateModal').modal();
	
	switch (option) { 
	
    case '1': {
	  typeTag = 'template';
      $('#templateModal').modal();	 
        break;}
	case '2': {
	  typeTag = 'domainName';
      $('#domainNameModal').modal();	 
        break;}
    case '3': {
	  typeTag = 'enterpriseEmail';
      $('#enterpriseEmailModal').modal();
        break;	}	
    case '4': {
	  typeTag = 'plugin';
      $('#pluginModal').modal(); 
        break;}
    case '5': {
	  typeTag = 'other';
      $('#otherTypeModal').modal();
        break;	}
	}
		
	});//end addButton
	
	
	/*
	*
	*set the function of save form button on every modal
	*/
	$(".formSave").click(function(){

	//get radio group selected value
//	$option = $("input:radio[name='radioGroup']:checked").val();
		
    var type ='';
	var info = '';
	var price = 0;
	
	switch (typeTag) { 
	
    case 'template': {
	
	var type ='Template';
	
	// Get validator instance
	var bv = $('#templateForm').data('bootstrapValidator');
	
	var demoURL = $("#templateForm").find('input[id="demoURL"]').val();
	var orderURL = $("#templateForm").find('input[id="orderURL"]').val();
	var description = $("#templateForm").find('textarea#description').val();
	
	price = $("#templateForm").find('input[id="price"]').val();	

	//validate data if the form is old
	if(editTag =='old')
	bv.validate();
	
    if(bv.isValid()){
	
	
	if(editTag =='new'){
	
	//add new row to form table
	var formValue = 
	"<tr><td style='display:none;'>Template</td>"+
	"<td>"+demoURL+"</td>"+
	"<td>"+orderURL+"</td>"+
	"<td>"+description+"</td>"+
	"<td>"+price+"</td>"+
	"<td><button type='button' class='edit btn-info'>Edit</button>"+
	"<button type='button' class='delete btn-info'>Delete</button></td>"+
	"</tr>";
	
	
	 //add a new row to table based on the form
	$('#templateFormListTable tbody').append(formValue);
	
	//prevent fire several times
	$(".edit").unbind('click').bind("click", Edit);
	$(".delete").unbind('click').bind("click", Delete);
	}else{
	//change old form 
	
	$('#templateFormListTable tr').eq(formIndex+1).find('td:eq(1)').text(demoURL);
	$('#templateFormListTable tr').eq(formIndex+1).find('td:eq(2)').text(orderURL);
	$('#templateFormListTable tr').eq(formIndex+1).find('td:eq(3)').text(description);
	$('#templateFormListTable tr').eq(formIndex+1).find('td:eq(4)').text(price);
	
	//alert($('#templateFormListTable tr').eq(formIndex+1).find('td:eq(1)').text());
	
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
	
	//save table value into tableData	
	var tableData = $("#templateFormListTable").tableToJSON({ 
	ignoreColumns: [5]}); //convert table value to JSON and ignore the 5th column	
	var tableDataString = JSON.stringify(tableData);	
	$("#tableJSON").val(tableDataString);
	
	}// end isValid
   
	  
		break;}
		
	case 'domainName': {
      
	  var type ='DomainName';
	
	// Get validator instance
	var bv = $('#domainNameForm').data('bootstrapValidator');
	
	var domainName= $("#domainNameForm").find('input[id="domainName"]').val();
	var serviceYear = $("#domainNameForm").find('input[id="serviceYear"]').val();
	var description = $("#domainNameForm").find('textarea#description').val();
	
	price = $("#domainNameForm").find('input[id="price"]').val();
	

	//validate data if the form is old
	if(editTag =='old')
	bv.validate();
	
		if(bv.isValid()){
	
	
	if(editTag =='new'){
	
	//add new row to form table
	var formValue = 
	"<tr><td style='display:none;'>DomainName</td>"+
	"<td>"+domainName+"</td>"+
	"<td>"+serviceYear+"</td>"+
	"<td>"+description+"</td>"+
	"<td>"+price+"</td>"+
	"<td><button type='button' class='edit btn-info'>Edit</button>"+
	"<button type='button' class='delete btn-info'>Delete</button></td>"+
	"</tr>";
	
	
	 //add a new row to table based on the form
	$('#domainNameFormListTable tbody').append(formValue);
	
	//prevent fire several times
	$(".edit").unbind('click').bind("click", Edit);
	$(".delete").unbind('click').bind("click", Delete);
	}else{
	//change old form 
	
	$('#domainNameFormListTable tr').eq(formIndex+1).find('td:eq(1)').text(domainName);
	$('#domainNameFormListTable tr').eq(formIndex+1).find('td:eq(2)').text(serviceYear);
	$('#domainNameFormListTable tr').eq(formIndex+1).find('td:eq(3)').text(description);
	$('#domainNameFormListTable tr').eq(formIndex+1).find('td:eq(4)').text(price);
	
	
	}
	  
	//hide the modal after saving the form
	$(".modal").modal('hide'); //hide modal
	
	//reset modal
	$('.modal').on('hidden.bs.modal', function(){
    $(this).find('form')[0].reset();
	$('#domainNameForm').bootstrapValidator('resetForm', true);
    });
	
	
	//renew the total price
	totalPrice();
	
	//save table value into tableData	
	var tableData = $("#domainNameFormListTable").tableToJSON({ 
	ignoreColumns: [5]}); //convert table value to JSON and ignore the 5th column	
	var tableDataString = JSON.stringify(tableData);	
	$("#tableJSON").val(tableDataString);
	
	}// end isValid  
	  
        break;}
    case 'enterpriseEmail': {
     
	 var type ='Enterprise Email';
	
	// Get validator instance
	var bv = $('#enterpriseEmailForm').data('bootstrapValidator');
	
	var domainName= $("#enterpriseEmailForm").find('input[id="domainName"]').val();
	var provider = $("#enterpriseEmailForm").find('input[id="provider"]').val();
	var storage = $("#enterpriseEmailForm").find('input[id="storage"]').val();
	var accountAmount = $("#enterpriseEmailForm").find('input[id="accountAmount"]').val();
	var serviceYear = $("#enterpriseEmailForm").find('input[id="serviceYear"]').val();
	var description = $("#enterpriseEmailForm").find('textarea#description').val();
	
	price = $("#enterpriseEmailForm").find('input[id="price"]').val();
	

	//validate data if the form is old
	if(editTag =='old')
	bv.validate();
	
		if(bv.isValid()){
	
	
	if(editTag =='new'){
	
	//add new row to form table
	var formValue = 
	"<tr><td style='display:none;'>EnterpriseEmail</td>"+
	"<td>"+domainName+"</td>"+
	"<td>"+provider+"</td>"+
	"<td>"+storage+"</td>"+
	"<td>"+accountAmount+"</td>"+
	"<td>"+serviceYear+"</td>"+
	"<td>"+description+"</td>"+
	"<td>"+price+"</td>"+
	"<td><button type='button' class='edit btn-info'>Edit</button>"+
	"<button type='button' class='delete btn-info'>Delete</button></td>"+
	"</tr>";
	
	
	 //add a new row to table based on the form
	$('#enterpriseEmailFormListTable tbody').append(formValue);
	
	//prevent fire several times
	$(".edit").unbind('click').bind("click", Edit);
	$(".delete").unbind('click').bind("click", Delete);
	}else{
	//change old form 
	
	$('#enterpriseEmailFormListTable tr').eq(formIndex+1).find('td:eq(1)').text(domainName);
	$('#enterpriseEmailFormListTable tr').eq(formIndex+1).find('td:eq(2)').text(provider);
	$('#enterpriseEmailFormListTable tr').eq(formIndex+1).find('td:eq(3)').text(storage);
	$('#enterpriseEmailFormListTable tr').eq(formIndex+1).find('td:eq(4)').text(accountAmount);
	$('#enterpriseEmailFormListTable tr').eq(formIndex+1).find('td:eq(5)').text(serviceYear);
	$('#enterpriseEmailFormListTable tr').eq(formIndex+1).find('td:eq(6)').text(description);
	$('#enterpriseEmailFormListTable tr').eq(formIndex+1).find('td:eq(7)').text(price);
	
	
	}
	  
	//hide the modal after saving the form
	$(".modal").modal('hide'); //hide modal
	
	//reset modal
	$('.modal').on('hidden.bs.modal', function(){
    $(this).find('form')[0].reset();
	$('#enterpriseEmailForm').bootstrapValidator('resetForm', true);
    });
	
	
	//renew the total price
	totalPrice();
	
	//save table value into tableData	
	var tableData = $("#enterpriseEmailFormListTable").tableToJSON({ 
	ignoreColumns: [5]}); //convert table value to JSON and ignore the 5th column	
	var tableDataString = JSON.stringify(tableData);	
	$("#tableJSON").val(tableDataString);
	
	}// end isValid  
	
        break;	}	
    case '4': {
      $('#pluginModal').modal(); 
        break;}
    case '5': {
      $('#otherTypeModal').modal();
        break;	}		
	}//end switch
		
	});// end formSave function
	
	
	/*
	* set the function of cancel button on modal
	*/	
   $(".formCancel").click(function(){
	
	//reset modal
	$('.modal').on('hidden.bs.modal', function(){
    $(this).find('form')[0].reset();
	$('#templateForm').bootstrapValidator('resetForm', true);
    });
	
	});// end formCnacel button
	
	/*
	* set the function of submit button 
	*/	
   $("#submit").click(function(){
	
	//reset modal
	$('.modal').on('hidden.bs.modal', function(){
    $(this).find('form')[0].reset();
	$('#templateForm').bootstrapValidator('resetForm', true);
    });
	
	});// end submit button
	
		
	/*
	* build validator for each form
	*/  
	$('#templateForm').bootstrapValidator({
				excluded: [':disabled'],
        fields: {
            dURL: {
                message: 'The demo URL is not valid',
                validators: {
                    notEmpty: {
                        message: 'The demo URL is required and cannot be empty'
                    }
                }
            },
            oURL: {
                message: 'The order URL is not valid',
                validators: {
                    notEmpty: {
                        message: 'The order URL is required and cannot be empty'
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
	
	//build validator for domain name form   
	$('#domainNameForm').bootstrapValidator({
				excluded: [':disabled'],
        fields: {
            dName: {
                message: 'The domain name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The domain name is required and cannot be empty'
                    }
                }
            },
            sYear: {              
                validators: {
                    notEmpty: {
                        message: 'The year of service is required'
                    },
                    numeric: {
                        message: 'The year of service must be a number'
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
    });//end domain Name form validation
	
	//build validator for enterprise email form   
	$('#enterpriseEmailForm').bootstrapValidator({
				excluded: [':disabled'],
        fields: {
            dName: {
                message: 'The domain name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The domain name is required and cannot be empty'
                    }
                }
            },
            dProvider: {
                message: 'The provider is not valid',
                validators: {
                    notEmpty: {
                        message: 'The provider is required and cannot be empty'
                    }
                }
            },	
			dStorage: {
                validators: {
                    notEmpty: {
                        message: 'The storage is required'
                    },
                    numeric: {
                        message: 'The storage must be a number'
                    }
                }
            },	
			aAmount: {
                validators: {
                    notEmpty: {
                        message: 'The account number is required'
                    },
                    numeric: {
                        message: 'The account number must be a number'
                    }
                }
            },
			sYear: {
                validators: {
                    notEmpty: {
                        message: 'The service year is required'
                    },
                    numeric: {
                        message: 'The service year must be a number'
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
    });//end enterprise email form validation
	
	
	//add edit function for edit button on  templateFormListTable
	function Edit(){
	
	//get current row and column number
//	var row = $(this).closest("tr").index()+1;
//	var col = $(this).closest("td").index()+1;
	
	editTag = 'old';// change old form	
	
	formIndex = $(this).closest("tr").index();//get the row number

	//get the type of this table
	var type = $(this).closest("div").attr('id');

	switch (type) { 
	
    case 'templateDiv': {
   
   	//get the value of first cell in this table, namely the demo URL
	var dURL = $(this).closest('tr').find('td:eq(1)').text();
	
	//get the value of second cell in this table, namely the order URL
	var oURL = $(this).closest('tr').find('td:eq(2)').text();
	
	//get the value of third cell in this table, namely description
	var description = $(this).closest('tr').find('td:eq(3)').text();
	
	//get the value of third cell in this table, namely the price
	var price = $(this).closest('tr').find('td:eq(4)').text();
	
    $('#templateModal').modal();
	$("#templateForm").find('input[id="demoURL"]').val(dURL);
	$("#templateForm").find('input[id="orderURL"]').val(oURL);
	$("#templateForm").find('textarea[id="description"]').val(description);
	$("#templateForm").find('input[id="price"]').val(price);

    typeTag = 'template';	
	  
        break;}
	case 'domainNameDiv': {
      
	//get the value of first cell in this table, namely the domain name
	var dName = $(this).closest('tr').find('td:eq(1)').text();
	
	//get the value of second cell in this table, namely the service of year 
	var sYear = $(this).closest('tr').find('td:eq(2)').text();
	
	//get the value of third cell in this table, namely description
	var description = $(this).closest('tr').find('td:eq(3)').text();
	
	//get the value of third cell in this table, namely the price
	var price = $(this).closest('tr').find('td:eq(4)').text();
	
    $('#domainNameModal').modal();
	$("#domainNameForm").find('input[id="domainName"]').val(dName);
	$("#domainNameForm").find('input[id="serviceYear"]').val(sYear);
	$("#domainNameForm").find('textarea[id="description"]').val(description);
	$("#domainNameForm").find('input[id="price"]').val(price);

    typeTag = 'domainName';	  
	  
        break;}
    case 'enterpriseEmailDiv': {
     
	 //get the value of first cell in this table, namely the domain name
	var dName = $(this).closest('tr').find('td:eq(1)').text();
	
	//get the value of second cell in this table, namely the provider of domain name 
	var dProvider = $(this).closest('tr').find('td:eq(2)').text();
	
	//get the value of third cell in this table, namely the amount of storage
	var dStorage = $(this).closest('tr').find('td:eq(3)').text();
	
	//get the value of fourth cell in this table, namely the amount of account 
	var aAmount = $(this).closest('tr').find('td:eq(4)').text();
	
	//get the value of fifth cell in this table, namely the service of year 
	var sYear = $(this).closest('tr').find('td:eq(5)').text();
	
	//get the value of sixth cell in this table, namely description
	var description = $(this).closest('tr').find('td:eq(6)').text();
	
	//get the value of seventh cell in this table, namely the price
	var price = $(this).closest('tr').find('td:eq(7)').text();
	
    $('#enterpriseEmailModal').modal();
	$("#enterpriseEmailForm").find('input[id="domainName"]').val(dName);
	$("#enterpriseEmailForm").find('input[id="provider"]').val(dProvider);
	$("#enterpriseEmailForm").find('input[id="storage"]').val(dStorage);
	$("#enterpriseEmailForm").find('input[id="accountAmount"]').val(aAmount);
	$("#enterpriseEmailForm").find('input[id="serviceYear"]').val(sYear);
	$("#enterpriseEmailForm").find('textarea[id="description"]').val(description);
	$("#enterpriseEmailForm").find('input[id="price"]').val(price);

    typeTag = 'enterpriseEmail';	  
	
        break;	}	
    case '4': {
      $('#pluginModal').modal(); 
        break;}
    case '5': {
      $('#otherTypeModal').modal();
        break;	}		
	}//end switch
	
	}//end Edit funtion
	
	//add delete function for delete button on  templateFormListTable
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
	
	//total price of template
	$('#templateFormListTable tr').each(function() { 
	$(this).find('td:eq(4)').each(function(){ 
	total  += parseFloat($(this).text()); 
	}); 
	}); 
	
	//total price of domain name
	$('#domainNameFormListTable tr').each(function() { 
	$(this).find('td:eq(4)').each(function(){ 
	total  += parseFloat($(this).text()); 
	}); 
	}); 
	
	
	//total price of enterprise email name
	$('#enterpriseEmailFormListTable tr').each(function() { 
	$(this).find('td:eq(7)').each(function(){ 
	total  += parseFloat($(this).text()); 
	}); 
	}); 
	
	//total price of plugins name
	$('#pluginFormListTable tr').each(function() { 
	$(this).find('td:eq(4)').each(function(){ 
	total  += parseFloat($(this).text()); 
	}); 
	}); 
	
	//total price of plugins name
	$('#otherTypeFormListTable tr').each(function() { 
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


    <!-- Template Form div --> 
	<fieldset>
	<legend>Template Form List</legend>
	<div class="row">
		<div class="col-md-10 col-md-offset-1"> <!-- center a div-->
		<div id="templateDiv" class="well">
	    <!-- Form List Content -->
		 
		<table id='templateFormListTable' class='table table-bordered'>
		<thead>
		<tr>
		    <th style='display:none;'>Type</th>
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
	</fieldset>
	<!-- ./Template Form div --> 

    <!-- Domain Name Form div --> 
	<fieldset>
	<legend>Domain Name Form List</legend>
	<div  class="row">
		<div class="col-md-10 col-md-offset-1"> <!-- center a div-->
		<div id='domainNameDiv' class="well">
	    <!-- Form List Content -->
		<table id='domainNameFormListTable' class='table table-bordered'>
		<thead>
		<tr>
		    <th style='display:none;'>Type</th>
			<th>Domain Name</th>
			<th>Service Year</th>
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
	</fieldset><!-- ./Domain Name Form div--> 
	
	<!-- Enterprise Email Form div --> 
	<fieldset>
	<legend>Enterprise Email Form List</legend>
	<div  class="row">
		<div class="col-md-10 col-md-offset-1"> <!-- center a div-->
		<div id="enterpriseEmailDiv" class="well">
	    <!-- Form List Content -->
		<table id='enterpriseEmailFormListTable' class='table table-bordered'>
		<thead>
		<tr>
		    <th style='display:none;'>Type</th>
			<th>Domain Name</th>
			<th>Provider</th>
			<th>Storage</th>
			<th>Account Number</th>
			<th>Service Year</th>
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
	</fieldset><!-- ./Enterprise Email Form div--> 
	
	<!-- Plugins Form div --> 
	<fieldset>
	<legend>Plugins Form List</legend>
	<div id="pluginDiv"  class="row">
		<div class="col-md-10 col-md-offset-1"> <!-- center a div-->
		<div class="well">
	    <!-- Form List Content -->
		 
		<table id='pluginFormListTable' class='table table-bordered'>
		<thead>
		<tr>
		    <th style='display:none;'>Type</th>
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
	</fieldset><!-- ./Plugins Form div --> 
	
	<!-- Plugins Form div --> 
	<fieldset>
	<legend>Other Form List</legend>
	<div id="otherTypeDiv"  class="row">
		<div class="col-md-10 col-md-offset-1"> <!-- center a div-->
		<div class="well">
	    <!-- Form List Content -->
		 
		<table id='otherTypeFormListTable' class='table table-bordered'>
		<thead>
		<tr>
		    <th style='display:none;'>Type</th>
			<th>Demo URL</th>
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
	</fieldset><!-- ./Plugins Form div --> 


	<div class="row">
	<div class="col-md-8 col-md-offset-2"> <!-- center a div-->
	<div class="well">
	
	<!-- will be used to show any messages -->
	@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	
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
    <!-- <button id='submit' class='btn btn-info'>Submit </button> -->
	
	{{ Form::hidden('tableData',"", array('id' => 'tableJSON')) }}
	{{ Form::submit('Submit Order!', array('class' => 'btn btn-primary')) }}

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

<!-- form -->
   
      </div>
      <div class="modal-footer">
	   <button type="submit" class="formSave btn-primary">Save Form</button> 
       <button type="button" class="formCancel btn-default" data-dismiss="modal">Cancel</button>      
      </div>
	  
	  </form> 
	  
    </div>	
  </div>
</div>
<!-- /.Template Modal -->

<!-- Domain Name Modal -->
<div class="modal fade" id="domainNameModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Purchase Form--Domain Name</h4>
      </div>
      <div class="modal-body">     
	   
<form id = "domainNameForm" class="form-horizontal" role="form">

  <div class="form-group">
    <label for="domainName" class="col-sm-4 control-label">Domain Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="domainName" name ='dName' placeholder="Domain">
    </div>
  </div>
  <div class="form-group">
    <label for="serviceYear" class="col-sm-4 control-label">Year of service</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="serviceYear" name='sYear' placeholder="How many years do you want">
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
      <input type="text" class="form-control" id="price" name='projectPrice' placeholder="Input price">
    </div>
  </div>


   
      </div>
      <div class="modal-footer">
	   <button type="submit" class="formSave btn-primary">Save Form</button>
       <button type="button" class="formCancel btn-default" data-dismiss="modal">Cancel</button>      
      </div>
	  
	  </form>
	  
    </div>
  </div>
</div>
<!-- /.Domain Name Modal -->


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
      <input type="text" class="form-control" id="domainName" name="dName" placeholder="Domain">
    </div>
  </div>
  <div class="form-group">
    <label for="provider" class="col-sm-4 control-label">Provider</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="provider" name='dProvider' placeholder="provider">
    </div>
  </div>
   <div class="form-group">
    <label for="storage" class="col-sm-4 control-label">Storage</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="storage" name='dStorage' placeholder="storage">
    </div>
  </div>
    <div class="form-group">
    <label for="accountAmount" class="col-sm-4 control-label">Account amount</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="accountAmount" name="aAmount" placeholder="How many accounts do you want">
    </div>
  </div>
  <div class="form-group">
    <label for="serviceYear" class="col-sm-4 control-label">Year of service</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="serviceYear" name="sYear" placeholder="How many years do you want">
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
      <input type="text" class="form-control" id="price" name='projectPrice' placeholder="Input price">
    </div>
  </div>

 
   
      </div>
      <div class="modal-footer">
	   <button type="submit" class="formSave btn-primary">Save Form</button>
       <button type="button" class="formCancel btn-default" data-dismiss="modal">Cancel</button>      
      </div>
	  
	  </form>
	  
    </div>
  </div>
</div>
<!-- /.Enterprise Email Modal -->
	
<!-- Plugin Modal -->
<div class="modal fade" id="pluginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Purchase Form--Plugins</h4>
      </div>
      <div class="modal-body">
       
	   
<form id = "pluginForm" class="form-horizontal" role="form">

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
<!-- /.Plugin Modal -->	
	
<!-- Other Type Modal -->
<div class="modal fade" id="otherTypeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Purchase Form--Others</h4>
      </div>
      <div class="modal-body">
       
<form id = "otherTypeForm" class="form-horizontal" role="form">

	<div class="form-group">
    <label for="demoURL" class="col-sm-4 control-label">Demo URL</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="demoURL" name='dURL' placeholder="Input URL">
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
<!-- /.Other Type Modal -->	

@stop

