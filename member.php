<!--	Page to display all art pieces by particular member	-->
<?php
	session_start();
	
	//	Get the member ID from the URL
	$memberID = $_GET['id'];
	
	/*	Grab all the artwork objects made by the member */
	$db = mysqli_connect("localhost" , "root" , "" , "gallery");
	$query_filenames = "select * from object where lower(username) like (select lower(username) from member where user_id = $memberID)";
	
	$query_username = "select username from member where user_id = $memberID";
	
	$pictures = mysqli_query($db , $query_filenames);
	$memberName = mysqli_query($db, $query_username);
	
	$row_user = mysqli_fetch_array($memberName);
	$page_title = "Artwork by ".ucwords($row_user['username']);
	include "includes/header.inc";
	include "includes/nav.inc";
?>

		<!--	Start page content 	-->
		<main>
			<h1>Artwork by <?php echo ucwords($row_user['username']); ?></h1>

			<?php
				if(mysqli_num_rows($pictures) > 0){
					
					echo "<div class=\"row\">";
					
					// Display all images by the user.
					while($row = mysqli_fetch_array($pictures)){
						print "\t\t\t\t<div class='col-lg-3 col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3'>\n";
						print "					<a href='artwork.php?id={$row["object_id"]}'><img class='img-thumbnail' src='uploads/{$row["filename"]}' alt='Image of the artwork {$row["title"]}'/></a>\n";
						print "				</div>\n";
					}
					
					echo "</div>";
				}
				else{
					echo "<h4>No images to show!</h4>";
				}
			?>
		</main>
		<!--	End page content 	-->
		
		<?php include "includes/footer.inc"; ?>