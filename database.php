<?php
	
	$server = 'localhost';
	$username = '<your-username>';
	$password = '<your-password>';
	$database = 'quizzer';

	//Create connection
	$mysqli = new mysqli($server,$username,$password,$database);

	//Check connection
	if($mysqli->connect_error)
	{
		printf("Connection failed: %s\n",$mysqli->connect_error);
		exit();
	} 
?>