<!-- Registration Form -->
<?php
	$page_title="Register";
	include "includes/header.inc";
	include "includes/nav.inc";
?>

		<!-- Start page content -->
		<main>
			<div class="d-flex justify-content-between my-3">
				<div class="border-right col-md-5 col-xs-12">
					<h1>Register</h1>
					<p>Use the form to register.</p>
				</div>
				<form class="col-md-6 col-xs-12" action="process_register.php" method="POST">
					<div class="form-group">
						<label class="required form-control-label font-weight-bold" for="username">Username</label>
						<input id='usernameInput' class="form-control" type="text" id="username" name="username" placeholder="Enter username" required />
						<span id="username-availability" class='text-success'></span>
					</div>
					<div class="form-group">
						<label class="required form-control-label font-weight-bold" for="password">Password</label>
						<input class="form-control" type="password" id="password" name="password" placeholder="Enter password" required />
					</div>
					<button class="btn btn-primary" type="submit">Register</button>
				</form>
			</div>
		</main>
		<script src='./js/check_register_form.js'></script>
		<!-- End page content -->
		<?php
			include "includes/footer.inc";
		?>