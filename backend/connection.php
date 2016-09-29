<?php

	$hostname = "localhost";
	$username = "dextero3_alwakal";
	$password = "demo@1234";
	$database = "dextero3_alwakalat";


	$conn = mysql_connect("$hostname","$username","$password") or die(mysql_error());
	mysql_select_db("$database", $conn) or die(mysql_error());

?>