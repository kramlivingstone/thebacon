<?php 

function get_title() {
	echo "Log Out";
}

function display_content() {
require_once '../partials/navbar.php';

if (isset($_SESSION['customer_username'])) {
	session_unset($_SESSION['customer_username']);
	// header("Refresh:0, url='bacon-logout.php'");
	header('location:bacon-logout.php');
}
?>

<div class="container">
	<div class="panel panel-default">
		<div class="panel-body">
			<p class="text-center">You have been successfully logged out!</p>
		</div>
	</div>
</div>



<?php 

}
require_once 'index.php';
require_once '../partials/footer.php';
?>
