<?php 

function get_title() {
	echo "Sign Out";
}

function display_content() {

if (isset($_SESSION['username'])) {
	session_unset($_SESSION['username']);
	header("Refresh:2, url='admin-login.php'");

}
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
	<hr>
	<div class="panel panel-default">
		<div class="panel-body">
			<p class="text-center">You have been successfully logged out!</p>
		</div>
	</div>
</div>



<?php 
require_once '../partials/footer.php';
}
require_once 'admin-index.php';
?>
