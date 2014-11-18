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



foreach($data as $k =>$v){
 echo $k;
 
 if($v['Type'] == 'Template')
 echo $v['Demo URL'];
 elseif($v['Type'] == 'DomainName')
 echo $v['Domain Name']." ".$v['Service Year'];
 elseif($v['Type'] == 'EnterpriseEmail')
 echo $v['Provider'];
 
 echo "<br>";
}

//echo $data;


?>

@stop




