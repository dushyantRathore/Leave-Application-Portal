<?php

session_start();
session_destroy();
echo "<h2>Redirecting..</h2>";
header( "refresh:1;url=MainPage.html" );

?>
