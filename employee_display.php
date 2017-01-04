<?php

# For database connectivity
require('connect.php') ;

# Session
session_start();

# Fetch the session variable
$employee_ID = $_SESSION['employee_ID'];

# Formation and execution of the SQL query1
$sql1 = "SELECT employee_Name FROM employee WHERE employee_ID = '$employee_ID'";
$query1 = mysql_query($sql1);

# Fetch the result
while($row1 = mysql_fetch_assoc($query1))
{
	$employee_Name = $row1['employee_Name'];
}

# Formation and execution of the SQL Query
$sql2 = "SELECT * FROM employee_leaveleft WHERE employee_ID = '$employee_ID'";
$query2 = mysql_query($sql2);

# Fetch the result
while($row2 = mysql_fetch_assoc($query2))
{
	$leave_Left = $row2['leave_Left'];
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="employee.css">
	<script src="https://use.fontawesome.com/b5c93d36d1.js"></script>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<a href="front.html"><img src="2000px-Indiabulls_logo.svg_.png"></a>
		</div>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="employee_sessiondestroy.php"><i class='fa fa-sign-out' aria-hidden:'true'></i> Log Out</a></li>
		</ul>
	</div>
</nav>
<br><br><br>
<h1 align = "center"><u>Welcome <?php echo $employee_Name?></u></h1>

<div style="height: 250px"></div>

<div class="container">
	<div class="row">
		<div class="col-lg-4 col-md-4">
			<div class="thumbnail">
				<form>
					<a href = "LeaveApplication.html" style="text-decoration:none"><button type="button" class="btn btn-success btn-lg btn-block">Apply for Leave</button></a>
				</form>
			</div>
		</div>
		<div class="col-lg-4 col-md-4">
			<div class="thumbnail">
				<form>
					<a href = "CheckStatus.php" style="text-decoration:none"><button type="button" class="btn btn-warning btn-lg btn-block">Check Status of Leave Application</button>
				</form>
			</div>
		</div>
		<div class="col-lg-4 col-md-4">
			<div class="thumbnail">
				<form>
					<button type="button" class="btn btn-info btn-lg btn-block">Leave Days Left : <?php echo $leave_Left ?></button>
				</form>
			</div>
		</div>
	</div>
</div>

</body>
</html>
