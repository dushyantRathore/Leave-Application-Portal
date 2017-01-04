<?php

$host = 'localhost';
$user = 'root';
$password = '';

mysql_connect($host, $user, $password);

$conn = mysql_select_db('leave_portal');

// if($conn)
// {
// 	echo "Connected to database successfully";
// }
//
// else
// {
// 	echo "Could not connect to database".mysql_error();
// }

?>
