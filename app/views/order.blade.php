@extends('layouts.master')

@section('title')
Order List
@stop

@section('jumbotron')
<h1>Order List</h1>
@stop

@section('content')
<h1>This is order test</h1>
<p>User detial</p>

<?php 

Input::merge(array('customerName' => 'new value'));

foreach($data as $k=>$v)
echo $k." value: ".$v."<br>";




?>

<button class='btn btn-info' id='author'>Add Item</button>	
@stop




