<?php
	/**
		Page that handles the update account process.
		
		@author Joseph Fehrman
	*/
	session_start();
	
	clearSession();
	header("Location: ../index.php");
	
	function clearSession(){
		session_unset();
		session_destroy();
	}
?>