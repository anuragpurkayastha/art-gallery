<?php
	/*	A PHP script which deletes the artwork.	*/
	session_start();
	
	//	Get the ID of the artwork to delete from the URL
	$id = $_GET['id'];
	
	//	Connect to database
	$db = mysqli_connect('localhost', 'root', '', 'gallery');
	
	//	First delete the file from the uploads folder.
	
	//	Find the filename of the artwork.
	$query = "select filename from object where object_id = $id";
	
	$result = mysqli_query($db,$query);
	
	$filename = mysqli_fetch_array($result);
	
	//	Remove from uploads directory.
	unlink('uploads/'.$filename[0]);
	
	//	Form the query
	$query = "delete from object where object_id = $id";
	
	mysqli_query($db, $query);
	
	header('Location:index.php');
	exit(0);
?>