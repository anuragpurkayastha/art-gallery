<!-- Art Gallery - index.php -->
<?php
	/*	Page set up 	*/
	session_start();
	$page_title = "Home";

	//	Get the 4 most recent images that were uploaded. Use ID to accomplish this.
	//	Just need filenames.
	$db = mysqli_connect("localhost" , "root" , "" , "gallery");	//	Connect to the database
	$query = "select title,filename from object order by object_id desc limit 4";

	//	Get the filenames
	$result = mysqli_query($db,$query);
	$filenames = array();	//	Array to store the filenames

	if(!empty($result)){

		while($row = mysqli_fetch_array($result)){
			array_push($filenames,$row['filename']);
		}
	}

	include "includes/header.inc";
	include "includes/nav.inc";
?>


			<!-- Start page content -->
			<main>
				<div class="row">
					<!-- Carousel -->
					<div id="homepageCarousel" class="carousel slide col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 d-inline-block" data-ride=false>
						<ol class="carousel-indicators">
							<li data-target="#homepageCarousel" data-slide-to="0" class="active"></li>
							<?php
								if(count($filenames) > 1):
									for($x=1; $x <= count($filenames) - 1; $x++):
										echo "<li data-target='#homepageCarousel' data-slide-to='$x'>";
										echo "</li>";
									endfor;
								endif;
							?>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item text-center text-white active">
								<img class="w-100 m-auto d-block" src='uploads/<?php echo $filenames[0]; ?>' alt="<?php echo (count($filenames) > 0)?$filenames[0]:'First slide'; ?>"/>
							</div>
							<?php
								if(count($filenames) > 1):
									foreach(array_slice($filenames,1) as $filename):
							?>
							<div class="carousel-item text-center text-white">
								<img class="w-100 m-auto d-block" src='uploads/<?php echo $filename; ?>' alt="First slide"/>
							</div>
							<?php
									endforeach;
								endif;
							?>
						</div>
						<a class="carousel-control-prev" href="#homepageCarousel" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#homepageCarousel" role="button" data-slide="next">
							<span class="carousel-control-next-icon"></span>
							<span class="sr-only">Next</span>
						</a>
					</div><!-- End Carousel -->

					<div class="about-box d-inline-block col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<h1 class="display-4">About</h1>
						<p class="lead">This is a gallery where artists can showcase their artwork.</p>
					</div>
				</div><!-- End Row -->

				<div class="row mt-2">
					<p class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent faucibus sapien ante, vitae maximus magna condimentum dapibus. Praesent mattis mi rhoncus ligula sagittis semper. Proin consequat, erat vitae varius consectetur, risus quam imperdiet risus, a eleifend ipsum tortor ac dolor. Fusce dapibus placerat ante ut efficitur. Aenean vitae sem aliquam, scelerisque mauris sit amet, rhoncus mauris. Morbi ullamcorper aliquet accumsan. Aliquam pretium malesuada tincidunt. Aliquam mi ex, varius quis ligula id, varius tincidunt risus. Suspendisse erat leo, lacinia sodales arcu ut, cursus mattis leo. Praesent enim ante, interdum nec semper id, sagittis sed dolor. In egestas cursus sem, eget ornare mauris aliquet eget. Nam eleifend nunc elementum elementum rutrum.</p>
					<p class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent faucibus sapien ante, vitae maximus magna condimentum dapibus. Praesent mattis mi rhoncus ligula sagittis semper. Proin consequat, erat vitae varius consectetur, risus quam imperdiet risus, a eleifend ipsum tortor ac dolor. Fusce dapibus placerat ante ut efficitur. Aenean vitae sem aliquam, scelerisque mauris sit amet, rhoncus mauris. Morbi ullamcorper aliquet accumsan. Aliquam pretium malesuada tincidunt. Aliquam mi ex, varius quis ligula id, varius tincidunt risus. Suspendisse erat leo, lacinia sodales arcu ut, cursus mattis leo. Praesent enim ante, interdum nec semper id, sagittis sed dolor. In egestas cursus sem, eget ornare mauris aliquet eget. Nam eleifend nunc elementum elementum rutrum.</p>
					<p class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent faucibus sapien ante, vitae maximus magna condimentum dapibus. Praesent mattis mi rhoncus ligula sagittis semper. Proin consequat, erat vitae varius consectetur, risus quam imperdiet risus, a eleifend ipsum tortor ac dolor. Fusce dapibus placerat ante ut efficitur. Aenean vitae sem aliquam, scelerisque mauris sit amet, rhoncus mauris. Morbi ullamcorper aliquet accumsan. Aliquam pretium malesuada tincidunt. Aliquam mi ex, varius quis ligula id, varius tincidunt risus. Suspendisse erat leo, lacinia sodales arcu ut, cursus mattis leo. Praesent enim ante, interdum nec semper id, sagittis sed dolor. In egestas cursus sem, eget ornare mauris aliquet eget. Nam eleifend nunc elementum elementum rutrum.</p>
				</div><!-- End Row -->
			</main>
			<!-- End page content -->
			<?php
				include "includes/footer.inc";
			?>
