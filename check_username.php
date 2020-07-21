<?php
	/**	check_username.php	*/
	$username = $_POST['user'];
	
	//	Connect to the database
	$db = mysqli_connect('localhost', 'root', '', 'gallery');
	
	//	Query
	$query = "select * from member where LOWER(username) LIKE '$username'";
	
	//	Run the query
	$records = mysqli_query($db, $query);
	$results = mysqli_fetch_array($records);
	
	if(!empty($results)):
		echo '1';
	else:
		echo '0';
	endif;
?>