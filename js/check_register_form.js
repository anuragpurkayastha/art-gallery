/**	check_register_form.js

	This script provides functionality to instantly check the registration form values.
*/
$(function(){
	$( '#usernameInput' ).blur(function(){
		let usernameInput = $( this ).val();	//	Get the current value of the username field.
		let username_regex = /^[a-zA-Z0-9]+$/;	//	Username regex to only allow alphanumeric characters.
		
		//	If the username does not have alphanumeric characters then disable register button and show message.
		if(!username_regex.test(usernameInput)){
			$( '#username-availability' ).text('Username must contain only alphanumeric characters!');
			$( '#username-availability' ).addClass('text-danger');
			$( '#submit-btn' ).prop('disabled',true);
		}
		//	Otherwise check if the username is available.
		else{
			$.ajax({
				url: 'check_username.php',
				type: 'POST',
				data: 'user='+usernameInput.toLowerCase(),
				dataType: 'text',
				success: function(result){
					if(result == '1'){
						$( '#username-availability' ).text('Username not available!');
						$( '#username-availability' ).addClass('text-danger');
						$( '#submit-btn' ).prop('disabled',true);
					}
					else{
						$( '#username-availability' ).text('');
						$( '#submit-btn' ).prop('disabled',false);
					}
				}
			});
		}
	});
});