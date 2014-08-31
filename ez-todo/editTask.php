<?php
	// Populates page based on get parameter task.
	include("./db/connection.php");
	$taskID = $_GET['task'];
	$_SESSION['username'];
	$SQL = "SELECT tt.id, task_name, description, difficulty_type, assigned_date, due_date, finished_date, status, commit FROM todo_task tt LEFT JOIN todo_task_difficulty_rating tdr ON tdr.id = tt.difficulty_id WHERE tt.id = '$taskID'";
	$results = mysqli_query($conn, $SQL) OR die("Error on query: " . $SQL);
	$row = mysqli_fetch_array($results);
	$ID = $row['id'];
	$task_name = $row['task_name'];
	$description = $row['description'];
	$difficulty = $row['difficulty_type'];
	$assigned_date = $row['assigned_date'];
	$due_date = $row['due_date'];
	$finished_date = $row['finished_date'];
	$status = $row['status'];
	$commit = $row['commit'];
	$due_date = date("m/d/Y",strtotime($due_date));
	if($finished_date != ""){
		$finished_date = date("m/d/Y",strtotime($finished_date));
	}
	$assigned_date = date("m/d/Y",strtotime($assigned_date));
	
?>
<script type="text/javascript" src="./jquery-ui-1.11.1/jquery-ui.js"></script>
<script type="text/javascript" src="./js/editTask.js"></script>
<link rel="stylesheet" type="text/css" href="./jquery-ui-1.11.1/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="./css/registration.css">
<div id="status"></div>
<form action="./process/processSaveTask.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $ID; ?>" />
	<table id="input_type_table">
		<tr><th colspan="2"><?php echo $task_name; ?></th></tr>
		<tr><td>Description:</td><td><textarea name="description" id="description"><?php echo $description; ?></textarea></td></tr>
		<tr><td>Difficulty:</td><td><p><?php echo $difficulty; ?></p></td></tr>
		<tr><td>Status:</td><td><p><?php echo  $status; ?></p></td></tr>
		<tr><td>Assigned:</td><td><p><?php echo $assigned_date; ?></p></td></tr>
		<tr><td>Due Date:</td><td><p><input type="text" id="due_date" name ="due_date" value="<?php echo $due_date; ?>" /></p></td></tr>
		<tr><td>Finished:</td><td><p><?php echo $finished_date; ?></p></td></tr>
		<tr><td>Commit:</td><td><input type="text" id="commit" name="commit" value="<?php echo $commit; ?>" /></td></tr>
		<tr><td colspan="2"><center>
			<input id="save_button" type="submit" value="Save" />
			<input id="resolve_button" type="button" value="Finish It!" />
		</center></td></tr>
	</table>
</form>