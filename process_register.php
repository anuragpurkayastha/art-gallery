<!-- Registration Process Script -->
<?php
	// Grab the username and password
	$username = $_POST['username'];
	$password = $_POST['password'];
	$hashed_pass = password_hash($password, PASSWORD_DEFAULT);
	
	// Connect to the database
	$db = mysqli_connect("localhost", "root", "" , "gallery") or die(mysqli_error($db));

	// Create the query to store the username and password into the "member" table.
	$query = "insert into member values(null, '$username', '$hashed_pass', now())";
	
	// Run the query
	mysqli_query($db, $query);
	
	$page_title = "Register";
	include "includes/header.inc";
	include "includes/nav.inc";
?>

		<!-- Start page content -->
		<h2 class="text-center">You have successfully registered!</h2>
		<p class="lead text-center">Click <a href="login.php">here</a> to login.</p>
		
		<?php
			include "includes/footer.inc";
		?>