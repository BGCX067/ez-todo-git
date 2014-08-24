<?php 	include("./db/connection.php"); ?>
<script type="text/javascript" src="./jquery-ui-1.11.1/jquery-ui.js"></script>
<script type="text/javascript" src="./js/newTask.js"></script>
<link rel="stylesheet" type="text/css" href="./jquery-ui-1.11.1/jquery-ui.css">
<form action="./process/processNewTask.php" method="POST">
	<table id="input_type_table">
		<tr><th colspan="2">New Task</th></tr>
		<tr><td>Task Name:</td><td><input type="text" name="task_name" id="task_name" /></td></tr>
		<tr><td>Description:</td><td><textarea name="description" id="description"></textarea></td></tr>
		<tr><td>Difficulty:</td><td><select name ="difficulty" id="difficulty">
			<?php 
				$SQL = "SELECT difficulty_type FROM todo_task_difficulty_rating";
				$results = mysqli_query($conn, $SQL) OR die("Error on query: " . $SQL);
				while($row = mysqli_fetch_array($results)) {
					echo "<option value=\"" . $row['difficulty_type'] . "\">" . $row['difficulty_type'] . "</option>";
				}
			?>
		</select></td></tr>
		<tr><td>Due Date:</td><td><input name="due_date" id="due_date" /></td></tr>
		<tr><td colspan="2"><center><input id="create_button" type="submit" value="Create" /></center></td></tr>
	</table>
	<a href="./?page=taskList"><== Back to task list</a>
</form>