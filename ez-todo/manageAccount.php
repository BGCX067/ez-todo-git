<?php
	include_once("./db/connection.php");
	$username = $_SESSION['username'];
	$SQL = "SELECT first_name, last_name, email FROM todo_user WHERE username = '$username'";
	$results = mysqli_query($conn, $SQL) OR die("Error on query: " . $SQL);
	$row = mysqli_fetch_array($results);
	$firstName = $row['first_name'];
	$lastName = $row['last_name'];
	$email = $row['email'];
?>
<script type="text/javascript" src="./js/manageAccount.js"></script>
<link rel="stylesheet" type="text/css" href="./css/registration.css">
<div id="status"></div>
<table id="update_account_info">
	<tr><th colspan="2">Account Info</th></tr>
	<tr><td>First Name:</td><td><input type="text" name="first_name" id="first_name" value="<?php echo $firstName; ?>"/></td></tr>
	<tr><td>Last Name:</td><td><input type="text" name="last_name" id="last_name" value="<?php echo $lastName; ?>" /></td></tr>
	<tr><td>Email:</td><td><input type="text" name="email" id="email" value="<?php echo $email; ?>" /></td></tr>
	<input type="hidden" id="username" value="<?php echo $_SESSION['username']; ?>" />
	<tr><td colspan="2"><center><input id="edit_account_button" type="button" value="Update Account" /></center></td></tr>
</table>