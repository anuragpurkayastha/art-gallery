<!-- Login Process Script -->
<?php
	$page_title = "Login";
	include "includes/header.inc";
	// Grab the username and password
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// Connect to the database
	$db = mysqli_connect("localhost", "root", "" , "gallery") or die(mysqli_error($db));

	// Create the query to store the username and password into the "member" table.
	$query = "select password from member where lower(username) like '$username'";
	
	// Run the query
	$records = mysqli_query($db, $query);
	$result = mysqli_fetch_array($records);
	$stored_pass = $result['password'];
	
	// If the login is successful, then start a session and assign 'username' to the session array.
	if(password_verify($password, $stored_pass)):
		session_start();
		$_SESSION['username'] = $username;
		include "includes/nav.inc";
?>

		<!-- Start page content -->
		<h2 class="text-center">Welcome <?php echo ucwords($username); ?>!</h2>
		<h3 class="text-center">You have successfully logged in!</h3>

<?php
	else:
		include "includes/nav.inc";
?>
		<h3 class="text-center">Login failed!
		<h4 class="text-center">Please check your username and password or register to access the site.</h4>
		<p class=" text-center lead">Please <a href="login.php">login</a> again or <a href="register.php">register here</a>.</p>
	<?php
	endif;
		include "includes/footer.inc";
	?>
	