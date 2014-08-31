<?php
	/**
		Page that processes page saving after a page is edited.
		
		@author Joseph Fehrman
	*/
	session_start();
	include_once("../db/connection.php");
	
	$ID = $_POST['id'];
	$description = $_POST['description'];
	$commit = $_POST['commit'];
	$dueDate = $_POST['due_date'];
	if($dueDate == "" || $dueDate == null){
		// ensures null value if no due date set.
		$finalDate = 'NULL';
	}else{
		// formats date
		$finalDate = "'" . date("Y-m-d H:i:s",strtotime($dueDate)) . "'";
	}
	
	$SQL = "UPDATE todo_task SET description='$description', commit='$commit', due_date=$finalDate WHERE id='$ID'";
	mysqli_query($conn, $SQL) OR die("Error on query: " . $SQL . mysql_error());
	// Redirects page
	echo "<script>window.location = \"../?page=taskList\"</script>";
?>