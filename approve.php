<?php

require('connect.php');

$employee_ID = $_GET['id'];


$sql1 = "UPDATE employee_leave SET status = '1' WHERE employee_ID = '$employee_ID'";
$query1 = mysql_query($sql1);

$sql2 = "SELECT leave_From, leave_Till from employee_leave WHERE employee_ID = '$employee_ID'";
$query2 = mysql_query($sql2);

if($query1 && $query2)
{
  echo "<h2>Status Updated Successfully</h2>";
  header( "refresh:1;url=form.html" );
}


 ?>
