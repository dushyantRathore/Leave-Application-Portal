<?php

require('connect.php');

if(isset($_POST['employee_ID'], $_POST['employee_Password']) && !empty($_POST['employee_ID']) && !empty($_POST['employee_Password']))
{

  $employee_ID = $_POST['employee_ID'];
  $employee_Password = $_POST['employee_Password'];

  $sql1 = "SELECT * FROM employee WHERE employee_ID = '$employee_ID' AND employee_Password = '$employee_Password' ";
  $query1 = mysql_query($sql1);

  if($query1)
  {
    $query_num_rows = mysql_num_rows($query1);

    if($query_num_rows == 0)
    {
      echo "<h1>Invalid Employee ID/Password Combination</h1>";
      header( "refresh:1;url=MainPage.html" );
    }
    else{
      echo "<h1>Redirecting...</h1>";
      header( "refresh:1;url=employee_display.php" );
      session_start();
      $_SESSION["employee_ID"] = $employee_ID;
    }
  }

}

 ?>
