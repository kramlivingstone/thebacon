 <?php 

function get_title() {
	echo "Dashboard";
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
	<hr>	
	<div class="panel panel-default">
		<div class="panel-body">
			<p class="text-center">You do not have administrator privileges to access this page!</p>
		</div>
	</div>
</div>

<?php
require_once '../partials/footer.php';
} else {
	require_once '../partials/admin-sidenav.php';
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
<div class="content">
	<div class="container-fluid">
		<p>TEST</p>
	</div>
</div>
</div>



<?php
}
}
require_once 'admin-index.php';

?>