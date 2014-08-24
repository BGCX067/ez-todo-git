/*
	Javascript for login.php page
	
	@author Joseph Fehrman
*/
//Load content when page finishes rendering.
jQuery(document).ready(function(){
	/*
		Applies an onclick even to the login button that submits to proccessLogin.php.  proccessLogin validates the form an sends a response.  If anything fails an error message will appear for the user.
	*/
	jQuery("#login_button").click(function(){
		var username = jQuery("#username").val();
		var password = jQuery("#password").val();
		jQuery.ajax({
			type: "POST",
			url: "./process/processLogin.php",
			data: {"username" : username, "password" : password},
			success:function(response){
				if(response.toLowerCase() != "success"){
					//On fail
					jQuery("#status").html(response);
				}else{
					//On success
					window.location = "./?page=taskList";
				}
			}
		});
	});
});