<?php

require('connect.php');

session_start();


if(isset($_POST["leave_From"], $_POST["leave_Till"], $_POST["reason"]))
{
  $employee_ID = $_SESSION["employee_ID"];
  $leave_From = $_POST["leave_From"];
  $leave_Till = $_POST["leave_Till"];
  $reason = $_POST["reason"];

  $sql1 = "SELECT team FROM employee_details WHERE employee_ID = '$employee_ID'";
  $query1 = mysql_query($sql1);


  while($row1 = mysql_fetch_assoc($query1))
  {
    $team = $row1['team'];

    $leave_From_str = strtotime($leave_From);
    $leave_Till_str = strtotime($leave_Till);
    $timeDiff = abs($leave_Till_str - $leave_From_str);
    $numberDays = $timeDiff/86400;  // 86400 seconds in one day
    // echo intval($numberDays);

    $sql2 = "INSERT INTO employee_leave VALUES ('$employee_ID', '$team', '$leave_From', '$leave_Till', '$reason', 0)";
    $query2 = mysql_query($sql2);

    $sql3 = "SELECT leave_Left FROM employee_leaveleft WHERE employee_ID = '$employee_ID'";
    $query3 = mysql_query($sql3);

    while($row3 = mysql_fetch_assoc($query3))
    {

      $days = $row3['leave_Left'];
      $daysleft = $days - $numberDays;
      // echo $days;
      // echo "<br>";
      // echo $numberDays;
      // echo "<br>";
      // echo $daysleft;

      if($daysleft >= 0)
      {
        $sql4 = "UPDATE employee_leaveleft SET leave_Left = '$daysleft' WHERE employee_ID = '$employee_ID'";
        $query4 = mysql_query($sql4);

        if($query4)
        {
          echo "<h1>Your application has been submitted successfully</h1>";
          // echo intval($numberDays);
          header( "refresh:2;url=employee_display.php" );
        }
      }
      else
      {
        echo "<h1>Sorry, Insufficient Leave Days Left</h1>";
        header( "refresh:2;url=employee_display.php" );
      }

    }

  }

}

?>
