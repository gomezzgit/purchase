@extends('layouts.master')

@section('title')
Form List
@stop

@section('jumbotron')
<h1>Order List</h1>
@stop

@section('content')
<p>Form detial</p>

<?php 

foreach($data as $k => $v)
echo $v['Demo URL'].$v['Order URL'].$v['Description'].$v['Price']."<br>";

//foreach($data as $k =>$v){
//foreach($v as $key => $value)
//echo $key."        ".$value." ";
//echo "<br>";
//}


?>

@stop




