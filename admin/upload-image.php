<?php 

function get_title() {
	echo "Image Upload";
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

	$message = '';
	require_once '../partials/admin-sidenav.php';

	require_once '../bacon-connection.php';


?>	
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-header">
				<h3>Image Upload</h3>
			</div>
			<label><?php echo $message; ?></label>
			<hr>
			<div class="panel-body">
				<form action="upload.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
					<input type="file" name="product-image" id="product-image">
					<input type="submit" name="submitImage" id="submitImage" class="btn btn-primary" value="Upload">
					<input type="submit" name="cancelUpload" id="cancelUpload" class="btn btn-default" value="Cancel">
				</form>
			</div>
		</div>
	</div>

<?php
}
}

require_once 'admin-index.php';
?>