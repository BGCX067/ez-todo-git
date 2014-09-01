<?php
	if(isset($_SESSION['username'])){
?>
		<script>window.location = "./index.php"</script>
<?php
	}
?>
<script type="text/javascript" src="./js/registration.js"></script>
<link rel="stylesheet" type="text/css" href="./css/registration.css">
<div id="status"></div>
<table id="registration_table">
	<tr><th colspan="2">Registration</th></tr>
	<tr><td>First Name:</td><td><input type="text" name="first_name" id="first_name" /></td></tr>
	<tr><td>Last Name:</td><td><input type="text" name="last_name" id="last_name" /></td></tr>
	<tr><td>Username:</td><td><input type="text" name="username" id="username" /></td></tr>
	<tr><td>Password:</td><td><input type="password" name="password" id="password" /></td></tr>
	<tr><td>Password-Confirmation:</td><td><input type="password" name="re_password" id="re_password" /></td></tr>
	<tr><td>Email:</td><td><input type="text" name="email" id="email" /></td></tr>
	<tr><td colspan="2"><center><input id="register_button" type="button" value="Register" /></center></td></tr>
</table>