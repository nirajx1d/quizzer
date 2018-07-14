<?php
	
	$server = 'localhost';
	$username = 'root';
	$password = 'niraj@123';
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