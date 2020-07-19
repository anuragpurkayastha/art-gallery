<!--	Upload artwork 	-->
<?php
	session_start();
	$page_title = "Add Artwork";
	include "includes/header.inc";
	include "includes/nav.inc";
?>

		<!--	Start page content 	-->
		<main>
			<h1>Upload Artwork</h1>
			<p>Use the form below to upload new artwork.</p>
			
			<form action="process_new_artwork.php" method="POST" enctype="multipart/form-data">
				<div class="form-group row">
					<label class="col-lg-2 required col-form-label font-weight-bold" for="artworkName">Artwork Name:</label>
					<div class="col-lg-9">
						<input class="form-control" type="text" id="artworkName" name="artworkName" placeholder="Enter name of artwork" required />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 required col-form-label font-weight-bold" for="artworkCategory">Category:</label>
					<div class="col-lg-9">
						<input class="form-control" type="text" id="artworkCategory" name="artworkCategory" placeholder="Enter category" required />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 col-form-label font-weight-bold" for="artworkYear">Year:</label>
					<div class="col-lg-4">
						<input class="form-control" type="number" min="0" id="artworkYear" name="artworkYear" placeholder="Enter year of artwork"/>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 col-form-label font-weight-bold" for="artworkPrice">Price:</label>
					<div class="input-group col-lg-4">
						<div class="input-group-prepend">
							<span class="input-group-text">$</span>
						</div>
						<input class="form-control" type="number" min="0" id="artworkPrice" name="artworkPrice" placeholder="Enter price of artwork"/>
						<div class="input-group-append">
							<span class="input-group-text">.00</span>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 col-form-label font-weight-bold" for="artworkDescription">Description:</label>
					<div class="col-lg-9">
						<textarea class="form-control" cols="70" id="artworkDescription" name="artworkDescription" placeholder="Enter description"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="required col-lg-2 form-control-label font-weight-bold" for="artworkFile">Upload file</label>
					<div class="col-lg-3">
						<input type="file" class="form-control-file" id="artworkFile" name="artworkFile" required />
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<button class="btn btn-primary btn-block" type="submit">Upload</button>
				</div>
			</form>
		</main>
		<!--	End page content 	-->
		
		<?php
			include "includes/footer.inc";
		?>