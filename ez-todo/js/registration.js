/*
	Javascript for the regisration page.
	
	@author Joseph Fehrman
*/
//Load content when page finishes rendering.
jQuery(document).ready(function(){
	/*
		Applies an onclick even to the registration button that submits to proccessRegistration.php.  processRegistration validates the form an sends a response.  If anything fails an error message will appear for the user.
	*/
	jQuery("#register_button").click(function(){
		//Variable value collection.
		var first_name = jQuery("#first_name").val();
		var last_name = jQuery("#last_name").val();
		var username = jQuery("#username").val();
		var password = jQuery("#password").val();
		var re_password = jQuery("#re_password").val();
		var email = jQuery("#email").val();
		jQuery.ajax({
			type: "POST",
			url: "./process/processRegistration.php",
			data: {"first_name" : first_name, "last_name" : last_name, "username" : username, "password" : password, "re_password" : re_password, "email" : email},
			success:function(response){
				// Check to see if data was added.
				if(response.toLowerCase() != "success"){
					//On fail
					jQuery("#status").html(response);
				}else{
					//On success
					window.location = "./?page=login";
				}
			}
		});
	});
});