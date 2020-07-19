<!--	Script to process new artwork	-->
<?php
	session_start();

	//	Get the uploaded file
	$uploaded_file = $_FILES['artworkFile']['tmp_name'];
	
	//	Create the target destination of uploaded files
	$unique_filename = uniqid().".".pathinfo($_FILES['artworkFile']['name'], PATHINFO_EXTENSION);
	$target_dir = "uploads/" . $unique_filename;

	//	Move the file to the destination
	move_uploaded_file($uploaded_file , $target_dir);

	/*	Now update the database with the values provided in the form	*/

	//	Variables
	$username = $_SESSION['username'];	//	Username of current logged in user
	$title = $_POST['artworkName'];		//	Title
	$category = $_POST['artworkCategory'];	//	Category
	$description = $_POST['artworkDescription'];	//	Description
	$year = $_POST['artworkYear'];	//	Year
	$price = $_POST['artworkPrice'];	//	Price
	$filename = $unique_filename;	//	Filename of artwork

	//	Connect to database
	$db = mysqli_connect("localhost", "root" , "" , "gallery") or die("Could not connect");

	//	Query to insert the data
	
	$query = "insert into object values (null, '$username' , '$title', '$category' , '$description' , '$year' , '$price' , '$filename')";

	//	Run the query
	mysqli_query($db , $query);

	$page_title = "Add Artwork";
	include "includes/header.inc";
	include "includes/nav.inc";
?>
		<!--	Start page content 	-->
		<main>
			<h3 class="text-center">Artwork successfully uploaded!</h3>
			<p class="text-center">A summary of the uploaded artwork is provided below.</p>

			<div class="summary-info border border-secondary col-lg-9 rounded mx-auto">
				<div class="row border-bottom">
					<p class="col-md-4 col-xs-12 text-md-right font-weight-bold">Title:</p>
					<p class="col-md-8 col-xs-12"><?php echo $title; ?></p>
				</div>
				<div class="row border-bottom">
					<p class="col-md-4 col-xs-12 text-md-right font-weight-bold">Category:</p>
					<p class="col-md-8 col-xs-12"><?php echo $category; ?></p>
				</div>
				<div class="row border-bottom">
					<p class="col-md-4 col-xs-12 text-md-right font-weight-bold">Year:</p>
					<p class="col-md-8 col-xs-12"><?php echo ($year != '')?$year:'Not provided'; ?></p>
				</div>
				<div class="row border-bottom">
					<p class="col-md-4 col-xs-12 text-md-right font-weight-bold">Price:</p>
					<p class="col-md-8 col-xs-12"><?php echo ($price != 0)?"$".number_format($price):'Not provided'; ?></p>
				</div>
				<div class="row border-bottom">
					<p class="col-md-4 col-xs-12 text-md-right font-weight-bold">Description:</p>
					<p class="col-md-8 col-xs-12"><?php echo ($description !=='')?nl2br($description):'Not provided'; ?></p>
				</div>

				<div class="row">
					<p class="col-md-4 col-xs-12 text-md-right font-weight-bold">Uploaded Artwork:</p>
					<div class="col-md-8 col-xs-12 mt-md-2">
						<img class="img-thumbnail" <?php echo "src='uploads/$filename'" ?> alt="Image of uploaded artwork"/>
					</div>
				</div>
			</div>
		</main>
		<!-- 	End page content 	-->

		<?php	include "includes/footer.inc";	?>
