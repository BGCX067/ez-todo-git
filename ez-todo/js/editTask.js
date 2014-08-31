/*
	Javascript file that processes editing task
*/
//Function that starts once page is rendered.
jQuery(document).ready(function(){
	//Replace description textarea with ckeditor
	CKEDITOR.replace("description");
	/*
		Adds an onclick event that resolves task.
	*/
	jQuery("#resolve_button").click(function(){
		// Variable collection
		var id = jQuery("input[name='id']").val();
		var description = CKEDITOR.instances.description.getData();
		var commit = jQuery("#commit").val();
		jQuery.ajax({
			type: "POST",
			url: "./process/processResolveTask.php",
			data: {"id" : id, "description" : description, "commit" : commit},
			success:function(response){
				alert("Fatality!");
				window.location = "/ez-todo/?page=taskList";
			}
		});
	});
	
	// replaces inputbox with jQuery UI datepicker
	jQuery("#due_date").datepicker();
});