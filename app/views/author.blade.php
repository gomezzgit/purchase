@extends('layouts.master')

@section('title')
Author detail list
@stop


@section('script')
@parent
<script>
$(document).ready(function(){



	//set function of submit button
	$("#go").click(function(){
	
	
	var data = $("#formListTable :input").serialize();;
	
	$.ajax({    //create an ajax request to getAuthor.php to search author's detail
        type: "POST",
        url: "author", 
        data: {tableData: data},			
        dataType: "JSON",   //expect html to be returned                
        success: function(data){ 
        
		window.location.replace('auhor');
		
		alert('success');
		
        }
    });//end ajax
	
	});// end submit button

});

</script>
@stop



@section('jumbotron')

<h1>Author list</h1>

@stop

@section('content')
<h1>Hello World!</h1>

	{{Form::open(array('id'=>'regForm'))}}   

    {{Form::label('name', 'Name', array('class'=>'control-label'))}}
    {{Form::text('name', null, array('class'=>'form-control','placeholder'=>'Enter Name'))}}
    <div id ="name_error"></div>

    {{Form::label('email', 'Email', array('class'=>'control-label'))}}
    {{Form::text('email', null, array('class'=>'form-control','placeholder'=>'Enter Email'))}}
    <div id ="email_error"></div>

    {{Form::label('password', 'Password', array('class'=>'control-label'))}}
    {{Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password'))}}   
    <div id ="password_error"></div>

    {{Form::label('password_confirmation', 'Confirm Password',array('class'=>'control-label'))}}
    {{Form::password('password_confirmation', array('class'=>'form-control','placeholder'=>'Confirm Password'))}}

		<table id='formListTable'  class='table table-bordered'>
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
		<tr>
		<td>g.com</td>
		<td>bd.com</td>
		<td>template</td>
		<td>173</td>
		<td>Add</td>
		</tr>
			
		
		</tbody>
		
		</table>

	{{Form::close()}}
	
	
	<button id='go'>Go!</button>

<div id="successMessage"></div>




@stop


