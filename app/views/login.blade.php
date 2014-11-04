@extends('layouts.default')

@section('title')
Login Page
@stop

@section('jumbotron')
<h1>Login Page</h1>
@stop


@section('content')

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif


{{ Form::open(array('url' => 'login', 'method' => 'post')) }}
{{Form::label('email','Email')}}
{{Form::text('email', null,array('class' => 'form-control'))}}
{{Form::label('password','Password')}}
{{Form::password('password',array('class' => 'form-control'))}}
{{Form::submit('Login', array('class' => 'btn btn-primary'))}}
{{ Form::close() }}


@stop
