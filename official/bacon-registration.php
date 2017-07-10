<?php 

function get_title() {
	echo "Registration";
}

function display_content() {
require_once '../partials/navbar.php';
require_once '../bacon-connection.php';

if (isset($_POST['register'])) {
	$fullname = $_POST['reg-full-name'];
	$username = $_POST['reg-username'];
	$password = $_POST['reg-password'];
	$confirm_password = $_POST['reg-password-confirm'];
	$address = $_POST['reg-address'];
	$email = $_POST['reg-email'];
	$contactnumber = $_POST['reg-contact-number'];

	if ($password == $confirm_password) {
		$password = sha1($password);

		$sql = "INSERT INTO bacon_customers(customer_name,customer_username,customer_password,customer_email_address,customer_address,customer_contact_number,role_id) VALUES ('$fullname','$username', '$password','$email','$address','$contactnumber','2')";

		mysqli_query($conn,$sql);

		header('location:bacon-login.php');
	} else {
		echo "Passwords does not match, Please try again!";
	}
}

if (isset($_POST['cancel'])) {
	header('location:bacon-login.php');
}
?>

<div class="container">
	<div class="panel panel-default">
		<h3>Registration</h3>
		<div class="panel-body">
			<form method="POST">
				<div class="form-group">
					<label for="reg-full-name">Enter Full Name: </label>
					<input class="form-control" type="text" name="reg-full-name" placeholder="Full Name">
				</div>
				<div class="form-group">
					<label for="reg-username">Enter Username: </label>
					<input class="form-control" type="text" name="reg-username" placeholder="Username">
				</div>
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="reg-password">Enter Password: </label>
						<input class="form-control" type="password" name="reg-password" placeholder="Password">
					</div>
					<div class="col-md-6 form-group">
						<label for="reg-password-confirm">Confirm Password: </label>
						<input class="form-control" type="password" name="reg-password-confirm" placeholder="Confirm Password">
					</div>
				</div>
				<div class="form-group">
					<label for="reg-address">Address: </label>
					<input class="form-control" type="text" name="reg-address" placeholder="Address">
				</div>
				<div class="row">
					<div class="col-md-6 form-group">
						<label for="reg-email">Enter E-mail Address: </label>
						<input class="form-control" type="email" name="reg-email" placeholder="E-mail Address">
					</div>
					<div class="col-md-6 form-group">
						<label for="reg-contact_number">Enter Contact Number: </label>
						<input class="form-control" type="tel" name="reg-contact-number" placeholder="Contact Number">
					</div>
				</div>
				<input type="submit" class="btn btn-primary" name="register" value="Register">
				<input type="submit" class="btn btn-danger" name="cancel" value="Cancel">
			</form>
		</div>
	</div>
</div>


<?php
}
require_once 'index.php';
require_once '../partials/footer.php';
?>
