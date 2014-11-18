@extends('layouts.master')

@section('title')
Order List
@stop

@section('jumbotron')
<h1>Order Detail</h1>
@stop

@section('content')
<h1>Order List</h1>


<?php 

echo "<table id='userTable' class='table table-bordered'>
<tr>".
"<th>id</th>
<th>Cusomter name</th>
<th>Project Chinese name</th>
<th>Project English name</th>
<th>State</th>
<th>Requested at</th>
<th>Authorised at</th>
<th>Requested by</th>
<th>Authorised by</th>
<th>comment</th>
</tr>";
foreach($order as $k=>$v){

  echo "<tr>";
  echo "<td>" . $v['id']. "</td>";
  echo "<td>" . $v['customer_name']. "</td>";
  echo "<td>" . $v['chinese_name'] . "</td>";
  echo "<td>" . $v['english_name'] . "</td>";
  echo "<td>" . $v['state'] . "</td>";
  echo "<td>" . $v['requested_at'] . "</td>";
  echo "<td>" . $v['authorised_at'] . "</td>";
  echo "<td>" . $v['requested_by'] . "</td>";
  echo "<td>" . $v['authorised_by'] . "</td>";
  echo "<td>" . $v['comment'] . "</td>";
  echo "</tr>";

}

echo "</table>";


echo "<h1>Template form list</h1>";
echo "<table id='tTable' class='table table-bordered'>
<tr>".
"<th>id</th>
<th>order id</th>
<th>type</th>
<th>demo url</th>
<th>order url</th>
<th>description</th>
<th>price</th>
</tr>";

foreach($template as $k=>$v){

  echo "<tr>";
  echo "<td>" . $v['id']. "</td>";
  echo "<td>" . $v['orderid']. "</td>";
  echo "<td>" . $v['type'] . "</td>";
  echo "<td>" . $v['demoURL'] . "</td>";
  echo "<td>" . $v['orderURL'] . "</td>";
  echo "<td>" . $v['description'] . "</td>";
  echo "<td>" . $v['price'] . "</td>";
  echo "</tr>";

}

echo "</table>";

echo "<h1>Domain name form list</h1>";
echo "<table id='userTable' class='table table-bordered'>
<tr>".
"<th>id</th>
<th>order id</th>
<th>type</th>
<th>domain name</th>
<th>service Year</th>
<th>description</th>
<th>price</th>
</tr>";

foreach($domain as $k=>$v){

  echo "<tr>";
  echo "<td>" . $v['id']. "</td>";
  echo "<td>" . $v['orderid']. "</td>";
  echo "<td>" . $v['type'] . "</td>";
  echo "<td>" . $v['name'] . "</td>";
  echo "<td>" . $v['serviceYear'] . "</td>";
  echo "<td>" . $v['description'] . "</td>";
  echo "<td>" . $v['price'] . "</td>";
  echo "</tr>";

}

echo "</table>";

echo "<h1>Enterprise email form list</h1>";
echo "<table id='userTable' class='table table-bordered'>
<tr>".
"<th>id</th>
<th>order id</th>
<th>type</th>
<th>domain name</th>
<th>provider</th>
<th>storage</th>
<th>domain name</th>
<th>account amount</th>
<th>description</th>
<th>price</th>
</tr>";

foreach($email as $k=>$v){

  echo "<tr>";
  echo "<td>" . $v['id']. "</td>";
  echo "<td>" . $v['orderid']. "</td>";
  echo "<td>" . $v['type'] . "</td>";
  echo "<td>" . $v['name'] . "</td>";
  echo "<td>" . $v['provider'] . "</td>";
  echo "<td>" . $v['storage'] . "</td>";
  echo "<td>" . $v['accountNumber'] . "</td>";
  echo "<td>" . $v['serviceYear'] . "</td>";
  echo "<td>" . $v['description'] . "</td>";
  echo "<td>" . $v['price'] . "</td>";
  echo "</tr>";

}

echo "</table>";


echo "<h1>Plugin form list</h1>";
echo "<table id='pluginTable' class='table table-bordered'>
<tr>".
"<th>id</th>
<th>order id</th>
<th>type</th>
<th>demo url</th>
<th>order url</th>
<th>description</th>
<th>price</th>
</tr>";

foreach($plugin as $k=>$v){

  echo "<tr>";
  echo "<td>" . $v['id']. "</td>";
  echo "<td>" . $v['orderid']. "</td>";
  echo "<td>" . $v['type'] . "</td>";
  echo "<td>" . $v['demoURL'] . "</td>";
  echo "<td>" . $v['orderURL'] . "</td>";
  echo "<td>" . $v['description'] . "</td>";
  echo "<td>" . $v['price'] . "</td>";
  echo "</tr>";

}
echo '</table>';


echo "<h1>Other form list</h1>";
echo "<table id='pluginTable' class='table table-bordered'>
<tr>".
"<th>id</th>
<th>order id</th>
<th>type</th>
<th>demo url</th>
<th>description</th>
<th>price</th>
</tr>";

foreach($other as $k=>$v){

  echo "<tr>";
  echo "<td>" . $v['id']. "</td>";
  echo "<td>" . $v['orderid']. "</td>";
  echo "<td>" . $v['type'] . "</td>";
  echo "<td>" . $v['demoURL'] . "</td>";
  echo "<td>" . $v['description'] . "</td>";
  echo "<td>" . $v['price'] . "</td>";
  echo "</tr>";

}

echo '</table>';

?>

@stop




