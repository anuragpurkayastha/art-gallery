/**	check_register_form.js

	This script provides functionality to instantly check the registration form values.
*/
$(function(){
	$( '#usernameInput' ).blur(function(){
		$( '#username-availability' ).text('Available');
	});
});