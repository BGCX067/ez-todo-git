<?php
	/**
		Page that handles the update account process.
		
		@author Joseph Fehrman
	*/
	session_start();
	include_once("../db/connection.php");
	
	// Collection of post variables
	$firstName = $_POST['first_name'];
	$lastName = $_POST['last_name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	
	processAccountUpdate($firstName, $lastName, $email, $username, $conn);
	
	/**
		Function that updates user information
		
		@param $fn - first name
		@param $ln - last name
		@param $email - email to put into the database
		@param $connection - database connection
	*/
	function processAccountUpdate($fn, $ln, $email, $user, $connection){
		$SQL = "UPDATE todo_user SET first_name='$fn', last_name='$ln', email='$email' WHERE username='$user'";
		mysqli_query($connection, $SQL) OR die("Error on query: " . $SQL);
		$_SESSION['first_name'] = $fn;
		$_SESSION['last_name'] = $ln;
		$_SESSION['email'] = $email;
		echo "success";
	}
?>