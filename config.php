<?php 
//setting connection between mysql and php
	$host="localhost";
	$user="root";
	$password='';
	$db_name="demo"; //database name
	
	$con = mysqli_connect($host, $user, $password, $db_name);
	if(mysqli_connect_error()){
		die("Failed to connect with mysql: ".mysqli_connect_error());
	}
?>