<?php
	/**
		Page that processes new task
		
		@author Joseph Fehrman
	*/
	session_start();
	include_once("../db/connection.php");

	// Post parameter collection
	$taskName = $_POST['task_name'];
	$description  = $_POST['description'];
	$difficulty = $_POST['difficulty'];
	$dueDate = $_POST['due_date'];
	// Grabs username
	$username = $_SESSION['username'];
	addTask($username, $dueDate, $difficulty, $description, $taskName, $conn);
	
	/**
		Creates a new task
		
		@param $username - username which new task is assigned
		@param $dueDate - due date of task
		@param $difficulty - how difficult the task is
		@param $description - description of the task assignment
		@param $taskName - task name of new task
		@param $conn - database connection
	*/
	function addTask($username, $dueDate, $difficulty, $description, $taskName, $conn){
		$sqlGetDifficultyID = "SELECT ID FROM todo_task_difficulty_rating WHERE difficulty_type = '$difficulty'";
		$results = mysqli_query($conn, $sqlGetDifficultyID) OR die("Error on query: " . $sqlGetDifficultyID);
		$row = mysqli_fetch_array($results);
		$diffID = $row['ID'];
		if($dueDate == "" || $dueDate == null){
			// ensures null value if no due date set.
			$finalDate = 'NULL';
		}else{
			// formats date
			$finalDate = "'" . date("Y-m-d H:i:s",strtotime($dueDate)) . "'";
		}
		$SQL = "INSERT INTO todo_task (username, task_name, description, difficulty_id, due_date, assigned_date, status) VALUES ('$username', '$taskName', '$description', '$diffID', $finalDate, now(), 'active')";
		mysqli_query($conn, $SQL) OR die("Error on query: " . $SQL . mysql_error());
		header('Location : ./?page=taskList');
		//Ensures page redirect
		echo "<script>window.location = \"../?page=taskList\"</script>";
		echo "<p>Task created</p>";
		echo "<a href=\"./?page=taskList\"><== Back to task list</a>";
	}
	
?>