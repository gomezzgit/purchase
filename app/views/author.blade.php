@extends('layouts.master')

@section('title')
Author detail list
@stop

@section('jumbotron')

<h1>Author list</h1>

@stop

@section('content')
<h1>Hello World!</h1>

<?php 


foreach ($data as $k=>$v)
echo $k." :".$v."<br>";




?>


@stop


