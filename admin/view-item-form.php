<?php 

	require_once '../bacon-connection.php';

	$product_id = $_POST['product_id'];

	if(isset($product_id)) {

		$sql = "SELECT * FROM bacon_products WHERE product_id = '$product_id'";

		$result = mysqli_query($conn,$sql);

		while ($row = mysqli_fetch_assoc($result)) {
			extract($row);


		}
?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<strong>Product ID: </strong><span><?php echo  $product_id; ?></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<img class="img-responsive" src="<?php echo $product_image; ?>" alt="product-image">
			</div>
			<div class="col-md-6">
				<p>
					<strong>Product Name: </strong><span><?php echo $product_name; ?></span>
				</p>
			</div>
			<div class="col-md-6">
				<p>
					<strong>Product Description: </strong><span><?php echo $product_description; ?></span>
				</p>
			</div>
			<div class="col-md-6">
				<p>
					<strong>Product Price: </strong><span><?php echo "Php " . $product_price . ".00"; ?></span>
				</p>
			</div>
		</div>
	</div>

<?php

	}

?>