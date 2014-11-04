@extends('layouts.master')

@section('title')
Purchase form
@stop

@section('jumbotron')
<h1>Purchase Form</h1>
@stop

@section('content')
<h1>This is a laravel tutorial!</h1>
<p>User detial</p>

<?php 
echo "<table id='userTable' class='table table-bordered'>
<tr>".
"<th>id</th>
<th>Name</th>
<th>Email</th>
</tr>";
foreach($users as $k=>$v){

  echo "<tr>";
  echo "<td>" . $v['password']. "</td>";
  echo "<td>" .$v['name']. "</td>";
  echo "<td>" . $v['email'] . "</td>";
  echo "</tr>";

}

echo "</table>";

?>

<button class='btn btn-info' id='author'>Add Item</button>	
@stop




