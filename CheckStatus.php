<?php

require('connect.php');

session_start();

$employee_ID = $_SESSION["employee_ID"];

$sql1 = "SELECT * FROM employee_leave WHERE employee_ID = '$employee_ID'";
$query1 = mysql_query($sql1);

while($row1 = mysql_fetch_assoc($query1))
{
  $status = $row1['status'];

  if($status == '0')
  {
    echo "<h1 align = 'center'><u>Your Application is Pending</u></h1>";
  }
  else if ($status == '1')
  {
    echo "<h1 align = 'center'><u>Your Application has been Accepted</u></h1>";
  }
  else if ($status == '2')
  {
    echo "<h1 align = 'center'><u>Your Application has been Rejected</u></h1>";
  }

}

?>
