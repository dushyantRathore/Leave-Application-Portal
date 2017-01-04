<?php

# For Database Connectivity
require('connect.php');
session_start();

$team = $_POST["team"];
$leave_From = $_POST["leave_From"]; //Selected Date in Form
$leave_Till = $_POST["leave_Till"]; //Selected Date in Form

$sql1 = "SELECT * FROM employee_leave WHERE team = '$team' AND leave_From >= '$leave_From' AND leave_Till <= '$leave_Till' ";
$query1 = mysql_query($sql1);


echo
"<h1 align = 'center'><u>Leave Applications</u></h1>
<br>
<br>
<table border = '5px' width = '700px' align = 'center' style='border-color:black;border-collapse: collapse;'>
		<tr>
			<th>Employee ID</th>
      <th>Employee Name</th>
			<th>Leave From</th>
      <th>Leave Till</th>
      <th>Reason</th>
      <th>Current Leave Status</th>
			<th>Action</th>
		</tr>
		" ;

		while($row1 = mysql_fetch_assoc($query1))
		{
      $employee_ID = $row1['employee_ID'];
      $leave_From = $row1['leave_From'];
      $leave_Till = $row1['leave_Till'];
      $reason = $row1['reason'];
      $status = $row1['status'];

      $sql2 = "SELECT employee_Name from employee WHERE employee_ID = '$employee_ID'";
      $query2 = mysql_query($sql2);

      while($row2 = mysql_fetch_assoc($query2))
      {

        $employee_Name = $row2['employee_Name'];

			if ($status == '0') #Pending Tasks
			{
				echo
				"<tr>
				<td>$employee_ID</td>
        <td>$employee_Name</td>
        <td>$leave_From</td>
        <td>$leave_Till</td>
        <td>$reason</td>
				<td style = 'background-color:yellow ; color : black ;'><b>Pending</b></td>
				<td><a href = 'approve.php?id=$employee_ID'>Approve</a>&nbsp;&nbsp;<a href = 'reject.php?id=$employee_ID'>Reject</a></td>
			</tr>
			" ;
		}
		else if ($status == '1') #Approved Tasks
		{
			echo
			"<tr>
      <td>$employee_ID</td>
      <td>$employee_Name</td>
      <td>$leave_From</td>
      <td>$leave_Till</td>
      <td>$reason</td>
			<td style = 'background-color:green ; color : white ;'>Approved</td>
			<td><a href='#' style='pointer-events:none'>Approve</a>&nbsp;&nbsp;<a href = '#' style='pointer-events:none'>Reject</a></td>
		</tr>
		" ;

	}
  elseif ($status == '2') #Rejected Tasks
	{
    echo
    "<tr>
    <td>$employee_ID</td>
    <td>$employee_Name</td>
    <td>$leave_From</td>
    <td>$leave_Till</td>
    <td>$reason</td>
    <td style = 'background-color:red ; color : white ;'>Rejected</td>
		<td><a href = '#' style='pointer-events:none'>Approve</a>&nbsp;&nbsp;<a href = '#' style='pointer-events:none'>Reject</a></td>
  </tr>
  " ;
  }

}

}

 ?>
