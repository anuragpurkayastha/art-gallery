<!--	Gallery of Images 	-->
<?php
	session_start();
	
	$page_title = "Gallery";
	include "includes/header.inc";
	include "includes/nav.inc";
	
	/*	Display all images 	*/
	
	//	Connect to the databases
	$db = mysqli_connect("localhost" , "root" , "" , "gallery");
	
	//	Get all objects
	$query = "select * from object";
	
	//	Select all filename of all images
	$records = mysqli_query($db,$query);
	
	//	Get all of the different categories
	$query = "select distinct category from object";
	$categories = mysqli_query($db, $query);
?>
		<!--	Start page content 	-->
		<main>
			<h1>Gallery</h1>
			
			<?php	
				//	If there are images in the database, then print the "Select Category" menu and display all images by default.
				if(mysqli_num_rows($records) > 0):
					echo "<div class='input-group mb-3 col-lg-4'>
						<div class='input-group-prepend'>
							<label class='input-group-text' for='selectCategoryMenu'>Category</label>
						</div>
						<select class='custom-select' id='selectCategoryMenu'>
							<option selected disabled>Select category...</option>
							<option value='all'>All</option>";
								//	Enter all of the categories present in the database.
								while($row = mysqli_fetch_array($categories)):
									print "<option value='{$row["category"]}'>{$row["category"]}</option>\n";
								endwhile;
						echo "</select>\n";
					echo "</div>";
					echo "<div id=\"images\" class=\"row\">\n";
					
					// Display all images
					while($row = mysqli_fetch_array($records)):
						print "\t\t\t\t<div class='col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3'>\n";
						print "					<a href='artwork.php?id={$row["object_id"]}'><img class='img-thumbnail' src='uploads/{$row["filename"]}' alt='Image of the artwork {$row["title"]}'/></a>\n";
						print "				</div>\n";
					endwhile;
					
					echo "</div>\n";
				//	Otherwise, if there are no images, display an appropriate message.
				else:
					echo "<p class='lead text-center'>Gallery is empty! This gallery will contain more images as users upload their artwork.</p>\n";
				endif;
			?>
		</main>
		<script src="js/selectCategory.js"></script>
		<!--	End page content 	-->
		
		<?php 	include "includes/footer.inc"; ?>