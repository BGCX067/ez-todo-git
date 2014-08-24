<?php 
	/**
		Page that processes resolving a task
		
		@author Joseph Fehrman
	*/
	include_once("../db/connection.php");
	
	$ID = $_POST['id'];
	$description = $_POST['description'];
	$commit = $_POST['commit'];
	$SQL = "UPDATE todo_task SET description='$description', commit='$commit', status='resolved', finished_date=now() WHERE id='$ID'";
	mysqli_query($conn, $SQL) OR die("Error on query: " . $SQL . mysql_error());
?>