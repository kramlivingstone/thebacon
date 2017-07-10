<?php 

function get_title() {
	echo "Delete Product";
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


	if(isset($_POST['delete-product'])) {
		$delete_sql = "DELETE FROM bacon_products WHERE product_id = $id";

		mysqli_query($conn,$delete_sql);
		header('location:product-management.php');
	}

	if(isset($_POST['cancel-delete-product'])) {
		header('location:edit-product.php?id=' . $id);
	}


	$select_sql = "SELECT * FROM bacon_products WHERE product_id = $id";

	$result = mysqli_query($conn, $select_sql);
		
	while($row = mysqli_fetch_assoc($result)){
		extract($row);		
	}
	
?>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
		<h1>Delete Product</h1>
		<hr>
		<div id="delete-panel" class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<label>Product ID:</label>
						<strong><?php echo $product_id; ?></strong> <br>
						<label>Product Name: </label>
						<strong><?php echo $product_name; ?></strong>
					</div>
					<div class="col-md-6">
						<div class="delete-image">
							<img class="img-responsive" src="<?php echo $product_image; ?>" alt="Image">
						</div>
					</div>
				</div>
				<form method="POST">
					<label class="text-danger">
						Are you sure you want to delete this item?
					</label>
					<div class="row">
						<input type="submit" name="delete-product" id="delete-product" class="btn btn-danger" value = "Yes">
						<input type="submit" name="cancel-delete-product" id="cancel-delete-product" class="btn btn-primary" value = "No">
					</div>
				</form>
			</div>
		</div>	

<?php
}
}
require_once 'admin-index.php';
?>

