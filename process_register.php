<!-- Registration Process Script -->
<?php
	// Grab the username and password
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//	Set up page config.
	$page_title = "Register";
	include "includes/header.inc";
	include "includes/nav.inc";
	
	//	If the username does not contain spaces or non-alphanumeric characters then process the registration
	if(preg_match('/^\w{1,}$/', $username)):
		$hashed_pass = password_hash($password, PASSWORD_DEFAULT);
		
		// Connect to the database
		$db = mysqli_connect("localhost", "root", "" , "gallery") or die(mysqli_error($db));

		// Create the query to store the username and password into the "member" table.
		$query = "insert into member values(null, '$username', '$hashed_pass', now())";
		
		// Run the query
		mysqli_query($db, $query);
?>

		<!-- Start page content -->
		<h2 class="text-center">You have successfully registered!</h2>
		<p class="lead text-center">Click <a href="login.php">here</a> to login.</p>
<?php
	else:
?>
		<h2 class="text-center">Username is not valid!</h2>
		<p class="lead text-center">Usernames must contain only alphanumeric characters. Click <a href="register.php">here</a> to try again.</p>
<?php
	endif;
?>
		
		<?php
			include "includes/footer.inc";
		?>