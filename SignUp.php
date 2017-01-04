<?php

require('connect.php');

if(isset($_POST["employee_ID"], $_POST["employee_Password"], $_POST["employee_Name"], $_POST["team"], $_POST["team_Leader"]))
{
  if(!empty($_POST["employee_ID"]) && !empty($_POST["employee_Password"]) && !empty($_POST["employee_Name"]) && !empty($_POST["team"])
  && !empty($_POST["team_Leader"]))
  {
    $employee_ID = $_POST["employee_ID"];
    $employee_Password = $_POST["employee_Password"];
    $employee_Name = $_POST["employee_Name"];
    $team = $_POST["team"];
    $team_Leader = $_POST["team_Leader"];

    $sql1 = "INSERT INTO employee VALUES('$employee_ID', '$employee_Password', '$employee_Name')";
    $query1 = mysql_query($sql1);

    $sql2 = "INSERT INTO employee_details VALUES('$employee_ID', '$employee_Name', '$team', '$team_Leader')";
    $query2 = mysql_query($sql2);

    if($query1 && $query2)
    {
      echo "<h2>Registered Successfully</h2>";
      header( "refresh:1;url=MainPage.html" );
    }
  }
  else {
    echo "<h2>Empty Fields not allowed</h2>";
    header( "refresh:1;url=MainPage.html" );
  }
}

 ?>
