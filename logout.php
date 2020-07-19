<!-- Logout Script -->
<?php
	session_start();		// Start a session
	$_SESSION = array();	// Unset $_SESSION variables
	session_destroy();		// Destroy the session.
	
	$page_title = "Logout";
	include "includes/header.inc";
	include "includes/nav.inc";
?>

		<!-- Start page content -->
		<h3 class="text-center">You have successfully logged out!</h3>
		
		<?php
			include "includes/footer.inc";
		?>