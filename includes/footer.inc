
			<!-- Footer -->
			<?php
				/*	Generate links for each artist	*/

				//	Connect to the database.
				$db = mysqli_connect("localhost" , "root" , "" , "gallery");

				//	Query to get the user IDs of the users who have uploaded artwork.
				$query = "select user_id, username from member where username in (select distinct username from object)";

				$result = mysqli_query($db, $query);
			?>
			<nav class="navbar navbar-expand">
				<ul class="navbar-nav">
				<?php
					if(!empty($result)){
						while($row = mysqli_fetch_array($result)){
							print "\t\t\t\t\t<li class='nav-item'>\n";
							print "\t\t\t\t\t\t<a class='nav-link' href=\"member.php?id={$row["user_id"]}\">".ucwords($row['username'])."</a>\n";
							print "\t\t\t\t\t</li>\n";
						}
					}
				?>
				</ul>
			</nav>

			<footer class="d-flex justify-content-between border-top">
				<p>&copy; Anurag Purkayastha</p>
				<a href="http://home.localhost">Back to Projects</a>
				<p>2020</p>
			</footer>

		</div><!-- End container -->
	</body>
</html>
