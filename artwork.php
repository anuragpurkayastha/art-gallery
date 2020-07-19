<!--	Page to display details about a piece of artwork 	-->
<?php
	session_start();
	
	//	Get all the details about the artwork with ID specified in URL.
	$id = $_GET['id'];	//	Get ID from URL
	
	//	Connect to database
	$db = mysqli_connect("localhost" , "root" , "" , "gallery");
	
	//	Get the record with ID corresponding to ID in url
	$query = "select * from object where object_id = $id";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_array($result);
	
	$page_title = "Artwork - ".$row['title'];
	include "includes/header.inc";
	include "includes/nav.inc";
?>

		<!--	Start page content 	-->
		<main>
			<div class="row">
				<img class="img-fluid col-md-6 rounded mt-2 borderRight-md-up" <?php echo "src='uploads/{$row['filename']}' alt='Image of {$row['title']}'"; ?>/>
				
				<div class="col-md-6">
					<div>
						<h1><?php echo $row['title']; ?></h1>
						<h4>By <?php echo ucwords($row['username']); ?></h4>
						<h5><?php echo $row['category']; ?></h5>
						<h5><?php echo ($row['year'] != '0000')?$row['year']:''; ?></h5>
						<h5><?php echo ($row['price'] != '0')? "Price: $".number_format($row['price']):''; ?></h5>
						
						<p><?php echo nl2br($row['description']); ?></p>
					</div>
					
					<?php if (isset($_SESSION['username']) && $row['username'] === $_SESSION['username']): ?>
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteArtworkConfirm">
							Delete Artwork
						</button>

						<!-- Modal -->
						<div class="modal fade" id="deleteArtworkConfirm" tabindex="-1">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Delete Artwork</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span>&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>Are you sure you want to delete this artwork?</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<a href="./delete_artwork.php?id=<?php echo $id; ?>" id="confirmDelete" type="button" class="btn btn-danger">Confirm</a>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</main>
		<!--	End page content 	-->
		
		<?php include "includes/footer.inc"; ?>