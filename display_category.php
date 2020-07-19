<?php
	//	Get the selected category
	$selected_category = $_POST['category'];
	
	//	Connect to the database
	$db = mysqli_connect( 'localhost' , 'root' , '' , 'gallery');
	
	//	If the selected category is not 'All', then display images from that category.
	if($selected_category != 'all'){
		//	Get all the pictures from database belonging to that category.
		$query = "select * from object where LOWER(category) LIKE '$selected_category'";
	}
	else 	{
		//	Otherwise, get all objects
		$query = "select * from object";
	}
	
	//	Select all filename of all images
	$records = mysqli_query($db,$query);
	
	while($row = mysqli_fetch_array($records)){
		echo "<div class='col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3'>\n";
		echo "<a href='artwork.php?id={$row["object_id"]}'><img class='img-thumbnail' src='uploads/{$row["filename"]}' alt='Image of the artwork {$row["title"]}'/></a>\n";
		echo "</div>\n";
	}
?>