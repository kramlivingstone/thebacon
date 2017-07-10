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
	 $warning = '';

	require_once '../partials/admin-sidenav.php';

	require_once '../bacon-connection.php';

	
	if (isset($_POST['edit-item'])) {
		// $product_id = $_POST['product_id'];
		$item_name = $_POST['edit-product-name'];
		$item_image = $_POST['edit-image-name'];
		$item_description = $_POST['edit-product-description'];
		$item_price = $_POST['edit-product-price'];
		$status = $_POST['edit-product-status'];

		$sql ="UPDATE bacon_products SET product_name = '$item_name', product_description = '$item_description', product_price = '$item_price', status_id = (SELECT status_id FROM bacon_status WHERE status_name = '$status') WHERE product_id = '$id'";

		mysqli_query($conn,$sql);
		// unset($_SESSION['product-image']);
		header('location:product-management.php');

	}
		

	if (isset($_POST['cancel-edit-item'])) {
		header('location:product-management.php');
	}

	$sql = "SELECT * FROM bacon_products WHERE product_id = '$id'";
	$result = mysqli_query($conn,$sql);

	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)){
		$product_status_id = $row['status_id'];
		extract($row);

?>	

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
		<h1>Edit Product</h1>
		<hr>
		<label class=text-danger><?php echo $warning; ?></label>
		<div class="panel panel-default">
			<div class="panel-header">
				<h4>Item Options</h4>
				<a href="upload-image.php?id=<?php echo $product_id; ?>" class="btn btn-primary">Upload Image</a>
				<a href="delete-products.php?id=<?php echo $product_id; ?>" class="btn btn-danger">Delete Item</a>
				<hr>
			</div>
			<div class="panel-body">
				<form method="POST">
					<div class="row">
						<div class="col-md-6 form-group">
							<strong>Product ID: <span><?php echo $product_id; ?></span></strong>
							<br><br>
							<label for="edit-product-name">Product Name:</label>
							<input type="text" name="edit-product-name" class="form-control" value="<?php echo $product_name; ?>">

							<label for="edit-image-name">Product Image:</label>
							<input type="text" name="edit-image-name" class="form-control" value="<?php echo $product_image; ?>">
					
							<label for="edit-product-description">Product Description:</label>
							<textarea class="form-control" name="edit-product-description"><?php echo $product_description; ?></textarea>
							<div class="row">
								<div class="col-sm-12 col-md-6">
									<label for="edit-product-price">Item Price:</label>
									<div class="input-group">
										<div class="input-group-addon">Php</div>
										<input type="text" class="form-control" name="edit-product-price" value="<?php echo $product_price; ?>">
										<div class="input-group-addon">.00</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-6">
									<label for="edit-product-status">Status:</label>
									<select name="edit-product-status" class="form-control">
										<?php 
											
											//echo $product_status_id;
											$sql = "SELECT * FROM bacon_status";
											$result = mysqli_query($conn,$sql);

											if(mysqli_num_rows($result)) {
												while ($row = mysqli_fetch_assoc($result)) {
													
													extract($row);
													if($product_status_id == $status_id)
													echo "<option selected>" . $status_name . "</option>";
													else
													echo "<option>" . $status_name . "</option>";
												}
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="edit-image">
								<img class="img-responsive" src="<?php echo $product_image; ?>" alt="Image">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<input type="hidden" name="product-id" id="product-id" value="<?php echo $product_id ?>">
							<input class="btn btn-primary" type="submit" name="edit-item" value="Save Changes">
							<input class="btn btn-default" type="submit" name="cancel-edit-item" value="Cancel">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


<?php
}
}
}
}
require_once 'admin-index.php';
?>