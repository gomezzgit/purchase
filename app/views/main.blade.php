@extends('layouts.default')

@section('title')
Form List
@stop

@section('jumbotron')
<h1>Purchase List</h1>
@stop


@section('content')

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif


<!-- <a href="{{ URL::to('pf') }}">Create New Purchase</a> -->
<button type="button" onclick="window.location='{{ URL::to('pf') }}'">Create New Purchase</button>


@stop
