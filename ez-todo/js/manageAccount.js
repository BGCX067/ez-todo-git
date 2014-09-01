/*
	Javascript for the regisration page.
	
	@author Joseph Fehrman
*/
//Load content when page finishes rendering.
jQuery(document).ready(function(){
	var username = jQuery("#username").val();

	/*
		Applies an onclick even to the update account button that submits to manageAccount.php.
	*/
	jQuery("#edit_account_button").click(function(){
		//Variable value collection.
		var first_name = jQuery("#first_name").val();
		var last_name = jQuery("#last_name").val();
		var email = jQuery("#email").val();
		jQuery.ajax({
			type: "POST",
			url: "./process/processUpdateAccount.php",
			data: {"first_name" : first_name, "last_name" : last_name, "username" : username, "email" : email},
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