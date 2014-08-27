<?php
	/**
		Page that processes login.
		
		@author Joseph Fehrman
	*/
	include_once("../db/connection.php");
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	authenticateUser($username, $password, $conn);
	
	/**
		Authenticates the user and creates a session.
		
		@param $user - username of user trying to log in.
		@param $pass - password attempt of user trying to log in.
		@param $connection - database connection.
	*/
	function authenticateUser($user, $pass, $connection){
		$shaPass = sha1($pass);
		$SQL = "SELECT first_name, last_name, username, email FROM todo_user WHERE username = '$user' AND password ='$shaPass'";
		$results = mysqli_query($connection, $SQL) OR die("Error on query: " . $SQL);
		//If username and password match
		if(mysqli_num_rows($results)){
			$row = mysqli_fetch_array($results);
			//collect session variables
			$firstName = $row['first_name'];
			$lastName = $row['last_name'];
			$username = $row['username'];
			$email = $row['email'];
			//pass variables to create session function
			createSession($firstName, $lastName, $username, $email);
		}else{
			echo "<p>Invalid username or password.</p>";
		}
	}
	
	/**
		Creates a session for a user
		
		@param $fn - first name of user
		@param $ln - last name of user
		@param $user - username of user
		@param $email - email of user
	*/
	function createSession($fn, $ln, $user, $email){
		session_start();
		$_SESSION['first_name'] = $fn;
		$_SESSION['last_name'] = $ln;
		$_SESSION['username'] = $user;
		$_SESSION['email'] = $email;
		echo "success";
	}
?>