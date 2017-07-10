<?php 

function get_title() {
	echo "Edit User";
}


function display_content() {


if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
?>
	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="admin-logo text-center">
				<h2>
					<a href="admin-login.php"><img class="img-responsive" src="../img/thebaconblack.png"></a>
				</h2>
			</div>
		</div>
	</div>	
	<div class="panel panel-default">
		<div class="panel-body">
			<p class="text-center">You do not have administrator privileges to access this page!</p>
		</div>
	</div>
</div>

<?php
require_once '../partials/admin-footer.php';
} else {

	$id = $_GET['id'];

	require_once '../partials/admin-sidenav.php';

	require_once '../bacon-connection.php';


	if(isset($_POST['save-user'])) {
		$password = $_POST['edit-password'];
		$confirmpassword = $_POST['edit-confirm-password'];
		$emailaddress = $_POST['edit-email-address'];
		$status = $_POST['edit-status'];

		if ($password == $confirmpassword) {
			$password = sha1($password);
			if($_POST['edit-password'] == "") {
				$sql = "UPDATE bacon_users SET email = '$emailaddress', status_id = (SELECT status_id FROM bacon_status WHERE status_name = '$status') WHERE user_id = '$id'";
			}
			else {
				$sql = "UPDATE bacon_users SET password = '$password', email = '$emailaddress', status_id = (SELECT status_id FROM bacon_status WHERE status_name = '$status') WHERE user_id = '$id'";

			}
			
			mysqli_query($conn,$sql);
			header('location:user-management.php');
		}
	}

	if(isset($_POST['cancel-user'])) {
		header('location:user-management.php');
	}

	$sql = "SELECT * FROM bacon_users WHERE user_id = '$id'";
	

	$result = mysqli_query($conn,$sql);
	


	if(mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		extract($row);
		}
	}
?>	

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
		<h1>Edit User</h1>
		<hr>
		<div class="panel panel-default">
			<div class="panel-body">
				<form method="POST">
					<div class="row">
						<div class="col-md-12 form-group">
							<label for="edit-username">Username: </label>
							<span><?php echo $username; ?></span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 form-group">
							<label for="edit-password">Password:</label>
							<input type="password" class="form-control" name="edit-password">
						</div>
						<div class="col-md-6 form-group">
							<label for="edit-confirm-password">Confirm Password:</label>
							<input type="password" class="form-control" name="edit-confirm-password">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="edit-email-address">E-mail Address:</label>
							<input type="email" class="form-control" name="edit-email-address" value="<?php echo $email; ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="edit-status">Change the user's status:</label>
							<select name="edit-status" class="form-control">
								<?php 

									$sql = "SELECT * FROM bacon_status";

									$result = mysqli_query($conn,$sql);

									if(mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										extract($row);

										echo "<option>" . $status_name . "</option>";

										}
									}
								?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<input type="submit" name="save-user" class="btn btn-primary" value="Save">
							<input type="submit" name="cancel-user" class="btn btn-default" value="Cancel">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


<?php

}
}
require_once 'admin-index.php';
?>