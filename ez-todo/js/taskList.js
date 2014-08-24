/*
	Javascript file that is used for taskList.php page.
*/
//Load content when page finishes rendering.
jQuery(document).ready(function(){
	getTask();
});

/*
	Uses ajax to pull task out of the database.
*/
var getTask = function(){
	var historical = jQuery("#completed").val();
	jQuery.ajax({
		type: "POST",
			data: {'completed_task' : historical},
			url: "./process/processGetTask.php",
			success:function(response){
				jQuery("#task_table").html(response);
				//polls for more task after 30 seconds.
				setTimeout(function(){getTask();}, 30000);
			}
	});
}
