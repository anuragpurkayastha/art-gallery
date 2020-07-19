			
			<!-- Navigation menu -->
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="index.php">Gallery</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="gallery.php">Gallery</a>
						</li>
						<?php
							if(!isset($_SESSION['username'])){
						?>
						<li class="nav-item">
							<a class="nav-link" href="register.php">Register</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="login.php">Login</a>
						</li>
						<?php
							}
							else{
						?>
						<li class="nav-item">
							<a class="nav-link" href="add_artwork.php">Upload Artwork</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">Logout</a>
						</li>
						<?php
							}
						?>
						</ul>
				 </div>
			</nav>
			
			<?php
				if(isset($_SESSION['username'])){
					echo "<div class='d-flex justify-content-end'>\n";
					echo "	<p class='m-0'><small>Currently logged in as: ".ucwords($_SESSION['username'])."</small></p>\n";
					echo "</div>\n";
				}
			?>