<?php 

function get_title() {
	echo "Log In";
}

function display_content() {
require_once '../partials/navbar.php';

$prompt = '';

if(isset($_POST['log-in'])) {

		require_once '../bacon-connection.php';

		$customer_username = $_POST['login-username'];
		$customer_password = sha1($_POST['login-password']);

		$sql = "SELECT * FROM bacon_customers a,bacon_role b
				WHERE a.customer_username = '$customer_username'
				AND a.customer_password = '$customer_password' AND a.role_id = b.role_id";

		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result)>0) {
			while($row = mysqli_fetch_assoc($result)) {
				extract($row);
					$_SESSION['customer_username'] = $customer_username;
					$_SESSION['customer_role'] = $role_name;
					header('location:bacon-home.php');
			}
		} else {
			$prompt = "Incorrect Username or Password!";
		}

	}
?>

<div class="container">
	<div class="panel panel-default">
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
				<input type="submit" class="btn btn-info" name="log-in" value="Log In">
			</form>
			<div class="row">
				<div class="col-md-6">
					<span><a href="#">Forgot Password?</a></span>
				</div>
				<div class="col-md-6">
					<span><a href="bacon-registration.php">Don't Have an Account yet?</a></span>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
}
require_once 'index.php';
require_once '../partials/footer.php';
?>
