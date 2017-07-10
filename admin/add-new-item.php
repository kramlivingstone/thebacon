<?php 

function get_title() {
	echo "Add New Product";
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
	require_once '../partials/admin-sidenav.php';

	require_once '../bacon-connection.php';

	if(isset($_POST['add-item'])) {
	$item_name = $_POST['product-name'];
	$item_description = $_POST['product-description'];
	$item_price = $_POST['product-price'];

	if($item_name != '' && $item_description != '' && $item_price != '') {

		$sql = "INSERT INTO bacon_products(product_name,product_description,product_price,status_id) VALUES ('$item_name', '$item_description','$item_price',1)";

		mysqli_query($conn,$sql);
		header('location:product-management.php');
	} else {
		echo "Please fill in the blanks!";
	}
}
	if (isset($_POST['cancel-add-item'])) {
		header('location:product-management.php');
	}

?>	
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
		<h1>Add New Product</h1>
		<hr>
		<div class="panel panel-default">
			<div class="panel-body">
				<form method="POST">
					<div class="row">
						<div class="col-md-6 form-group">
							<label for="product-name">Item Name:</label>
							<input type="text" class="form-control" id="product-management" name="product-name" placeholder="Item Name">
					
							<label for="product-description">Item Description:</label>
							<textarea class="form-control" id="product-description" name="product-description" placeholder="Item Description"></textarea>
						
							<label for="product-price">Item Price:</label>
							<div class="input-group" id="price-width">
								<div class="input-group-addon">Php</div>
								<input type="text" class="form-control" name="product-price" id="product-price">
								<div class="input-group-addon">.00</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<input class="btn btn-primary" type="submit" name="add-item" value="Save Changes">
							<input class="btn btn-default" type="submit" name="cancel-add-item" value="Cancel">
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