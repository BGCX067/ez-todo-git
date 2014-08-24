<?php
/**
	Creates reusable php database connection
	
	@author Joseph Fehrman

*/
include_once("sqlconfig.php");
$conn = mysqli_connect($dbSource, $dbUsername, $dbPassword, $db)
	or die ("Cannot connect to database -- post.php");
?>
