@extends('layouts.formStyel')


@section('script')
@parent
	<!--add scripts for document -->
	<script>
		
	
	</script>
@stop


@section('title')
Domain name list
@stop

@section('jumbotron')
<h1>Domain Name Detail</h1>
@stop

@section('navigation')
        <li><a href="{{ URL::to('main') }}">Main</a></li>
		<li><a href="{{ URL::to('pf') }}">Create Order</a></li>
@stop


@section('content')


	

    <!-- Domain Name Form div --> 
	<div  class="row" id='domainNameListDiv'>
	<fieldset>
	<legend>Domain Name Form List</legend>
		<div class="col-md-10 col-md-offset-1"> <!-- center a div-->
		<div id='domainNameDiv' class="well">
	    <!-- Form List Content -->
		<table id='domainNameFormListTable' class='table table-bordered table-hover'>
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
	
@stop

