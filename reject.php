<?php

require('connect.php');

$employee_ID = $_GET['id'];

$sql1 = "UPDATE employee_leave SET status = '2' WHERE employee_ID = '$employee_ID'";
$query1 = mysql_query($sql1);

if($query1)
{
  echo "<h2>Updating Status</h2>";
  header( "refresh:1;url=form.html" );
}

 ?>
