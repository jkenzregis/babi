<?php
	$conn=mysqli_connect("localhost", "root", "", "evaluation_db");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>