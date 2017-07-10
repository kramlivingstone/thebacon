<?php 

function get_title() {
	echo "Admin Login";
}

function display_content() {

	$prompt = '';

	if(isset($_POST['log-in'])) {

		require_once '../bacon-connection.php';

		$username = $_POST['login-username'];
		$password = sha1($_POST['login-password']);

		$sql = "SELECT * FROM bacon_users a,bacon_role b
				WHERE a.username = '$username'
				AND a.password = '$password' AND a.role_id = b.role_id";

		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result)>0) {
			while($row = mysqli_fetch_assoc($result)) {
				extract($row);
				if($status_id != '1') {
          header('location:admin-disabled.php');
				} else {
					$_SESSION['username'] = $username;
          $_SESSION['role'] = $role_name;
          header('location:admin-dashboard.php');
				}
			}
		} else {
			$prompt = "Incorrect Username or Password!";
		}

	}
?>


<div class="container login-container">
	<div class="row">
		<div class="col-md-12">
			<div class="admin-logo text-center">
				
					<a href="admin-login.php"><img src="../img/thebaconblack.png"></a>
				
			</div>
		</div>	
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<div id="panel-login" class="panel panel-default">
				<h3>Log In</h3>
				<label class="text-danger"><?php echo $prompt; ?></label>
				<div class="panel-body">
					<form method="POST">
						<div class="form-group">
							<input class="form-control" type="text" name="login-username" placeholder="Username">
						</div>
						<div class="form-group">
							<input class="form-control" type="password" name="login-password" placeholder="Password">
						</div>
						<div class="checkbox">
						    <label>
						      <input type="checkbox"> Remember Me
						    </label>
						 </div>
						<input type="submit" class="btn btn-primary" name="log-in" value="Log In">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
require_once '../partials/footer.php';
}
require_once 'admin-index.php';
?>
