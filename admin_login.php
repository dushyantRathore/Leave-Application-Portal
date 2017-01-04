<?php

# For Database Connectivity
require('connect.php');

if(isset($_POST['admin_ID'], $_POST['admin_Password']))
{
  $admin_ID = $_POST['admin_ID'];
  $admin_Password = $_POST['admin_Password'];

  # Formation and execution of SQL Query
  $sql1 = "SELECT  admin_ID, admin_Password FROM admin WHERE admin_ID = '$admin_ID' AND admin_Password = '$admin_Password' ";
  $query1 = mysql_query($sql1);

  if($query1)
  {
    $query_num_rows = mysql_num_rows($query1); # Fetch the database rows

    if($query_num_rows == 0)
    {
      echo "<h1>Invalid ID/Password Combination</h1>"; # No rows fetched
      header( "refresh:1;url=MainPage.html" );
    }
    else{
      echo "<h1>Redirecting...</h1>";
      header( "refresh:1;url=form.html" ); # Valid Data fetched - redirect
    }
  }

}

 ?>
