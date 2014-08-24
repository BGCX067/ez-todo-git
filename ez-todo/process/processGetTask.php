<?php
	/**
		Page that processes ajax calls made by taskList.php page.
		
		@author Joseph Fehrman
	*/
	session_start();
	include_once("../db/connection.php");
	
	$username = $_SESSION['username'];
	$validation = getTask($username, $conn);
	
	/**
		Prints the current task list as the response.
	*/
	function getTask($user, $connection){
		$completed = $_POST['completed_task'];
		$taskHTML = "<tr><th>ID</th><th>Task Name</th><th>Description</th><th>Difficulty</th><th>Assigned</th><th>Due</th><th></th></tr>";
		// Check to see if the page needs to load active or resolved task.
		if($completed == "true"){
			$status = "resolved";
		}else{
			$status = "active";
		}
		$sqlGetTask = "SELECT tt.id as id, task_name, description, tdr.difficulty_type as difficulty_type, assigned_date, due_date FROM todo_task tt LEFT JOIN todo_task_difficulty_rating tdr ON tdr.id = tt.difficulty_id WHERE Username = '$user' AND status='$status'";
		$results = mysqli_query($connection, $sqlGetTask) OR die("Error on query: " . $sqlGetTask);
		while($row = mysqli_fetch_array($results)) {
			$taskHTML .=  "<tr><td>" . $row['id'] . "</td><td><a href=\"./?page=editTask&task=" . $row['id'] . "\">" . $row['task_name']  . "</a></td><td>" . $row['description']  . "</td><td>" . $row['difficulty_type'] . "</td><td>" . $row['assigned_date'] . "</td><td>" . $row['due_date'] . "</td><td></td></tr>";
		}
		if($taskHTML == "<tr><th>ID</th><th>Task Name</th><th>Description</th><th>Difficulty</th><th>Assigned</th><th>Due</th><th></th></tr>"){
			$taskHTML .= "<tr><td colspan=\"7\">No task available.</td></tr>";
		}
		echo $taskHTML;
	}
?>