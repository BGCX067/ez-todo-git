		<script type="text/javascript" src="./js/taskList.js"></script>
		<input type="hidden" id="completed" value="<?php
			// Check to see if there is an attempt to load completed task
			if(isset($_GET['finish']) && ($_GET['finish'] == 1)){
				echo "true";
			}else{
				echo "false";
			}
		?>"/>
		<table>
			<tr><th colspan="6"><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "'s Task"; ?></th></tr>
			<tr><td colspan="6"><table id="task_table"></table></td></tr>
		</table>
		<a href="./?page=newTask">+ Add a new Task</a><br/>