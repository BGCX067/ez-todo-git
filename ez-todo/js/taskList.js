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
				sleep(30000);
				//polls for more task after 30 seconds.
				getTask();
			}
	});
}

/*
	Sleep function to tell the ajax function to wait until it needs to be called again.
*/
function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}