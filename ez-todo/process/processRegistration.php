<?php
	/**
		Page that handles the registration process.
		
		@author Joseph Fehrman
	*/
	include_once("../db/connection.php");
	
	// Collection of post variables
	$firstName = $_POST['first_name'];
	$lastName = $_POST['last_name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$passwordConfirmation = $_POST['re_password'];
	$email = $_POST['email'];
	
	// Validation function
	$validation = validateRegistration($username, $password, $passwordConfirmation, $email, $conn);
	if($validation == "success"){
		// If content is valid
		processRegistration($firstName, $lastName, $username, $password, $email, $conn);
	}
	
	/**
		Function that validates user input on registration page.
		
		@param $user - requested username
		@param $pass - requested password
		@param $repass - password confirmation
		@param $email - requested email
		@param $connection - database connection
	*/
	function validateRegistration($user, $pass, $rePass, $email, $connection){
		//Check if username already exist.
		$validationError = "";
		$sqlUsernameCheck = "SELECT Username FROM todo_user WHERE Username = '$user'";
		$results = mysqli_query($connection, $sqlUsernameCheck) OR die("Error on query: " . $sqlUsernameCheck);
		if(mysqli_num_rows($results)){
			$validationError .= "<p>USERNAME: The username you selected already exist in the database.</p>\n";
		}
		//Check to ensure password match.
		if($pass != $rePass){
			$validationError .= "<p>PASSWORD: The passord you put in does not match the password confirmation box.</p>\n";
		}
		//Check to ensure email doesn't already have an account associated with it.
		$sqlEmailCheck = "SELECT Email FROM todo_user WHERE Email = '$email'";
		$results = mysqli_query($connection, $sqlUsernameCheck) OR die("Error on query: " . $sqlEmailCheck);
		if(mysqli_num_rows($results)){
			$validationError .= "<p>EMAIL: The email you used already has an account associated with it.</p>\n";
		}
		if($validationError == ""){
			return "success";
		}else{
			return $validationError;
		}
	}
	
	/**
		Function that creates user
		
		@param $fn - first name
		@param $ln - last name
		@param $user - username to add to the database
		@param $pass - password to put into database
		@param $email - email to put into the database
		@param $connection - database connection
	*/
	function processRegistration($fn, $ln, $user, $pass, $email, $connection){
		$shaPass = sha1($pass);
		$SQL = "INSERT INTO todo_user (first_name, last_name, username, password, email) VALUES ('$fn', '$ln', '$user', '$shaPass', '$email')";
		mysqli_query($connection, $SQL) OR die("Error on query: " . $SQL);
		echo "success";
	}
?>