<!-- Login Form -->
<?php
	$page_title="Login";
	include "includes/header.inc";
	include "includes/nav.inc";
?>

		<!-- Start page content -->
		<main>
			<div class="d-flex justify-content-between my-3">
				<div class="border-right col-md-5 col-xs-12">
					<h1>Login</h1>
					<p>Use the form to login.</p>
				</div>
				<form class="col-md-6 col-xs-12" action="process_login.php" method="POST">
					<div class="form-group">
						<label class="required form-control-label font-weight-bold" for="username">Username</label>
						<input class="form-control" type="text" id="username" name="username" placeholder="Enter username" required />
					</div>
					<div class="form-group">
						<label class="required form-control-label font-weight-bold" for="password">Password</label>
						<input class="form-control" type="password" id="password" name="password" placeholder="Enter password" required />
					</div>
					<button class="btn btn-primary" type="submit">Login</button>
				</form>
			</div>
		</main>
		<!-- End page content -->
		<?php
			include "includes/footer.inc";
		?>