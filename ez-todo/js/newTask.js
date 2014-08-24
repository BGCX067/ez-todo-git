/*
	Javascript for newTask.php page.
*/
jQuery(document).ready(function(){
	// replaces description textarea
	CKEDITOR.replace("description");
	// replaces inputbox with jQuery UI datepicker
	jQuery("#due_date").datepicker();
});