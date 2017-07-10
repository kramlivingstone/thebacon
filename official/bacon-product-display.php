<?php 

function get_title() {
	echo "Products";
}

function display_content() {
require_once '../partials/navbar.php';
require_once '../partials/bacon-sidebar.php';
require_once '../bacon-connection.php';


$product_id = $_GET['id'];
$message = '';



if(isset($_POST['add-to-cart'])) {

	$quantity = $_POST['product-quantity'];
	$_SESSION['cart'][$product_id] += $quantity;
	foreach ($_SESSION['cart'] as $key => $value) {
		if (!empty($value)) {
			
			$message = $key . $value;

		} else {
			$message = "NULL";
		}
	}
	// if($_SESSION['cart'])
	// header('location:bacon-cart.php');
	// var_dump($_SESSION['cart']);
}


$sql = "SELECT * FROM bacon_products WHERE product_id = $product_id ";

$result = mysqli_query($conn,$sql);
?>
<div class="container-fluid">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 content">
<label><?php echo $message; ?></label>
<?php

if(mysqli_num_rows($result) > 0) {
	echo '<div class="row">';
	while ($row = mysqli_fetch_assoc($result)) {
	extract($row);
	
?>

		<div class="col-sx-12 col-sm-12 col-md-6">
			<div class="item-image">
				<img class="img-responsive" src="<?php echo $product_image; ?>">
			</div>
		</div>
		<div class="col-sx-12 col-sm-12 col-md-6">
			<label><?php echo $product_name; ?></label>
			<p><?php echo $product_description; ?></p>
			<h2><?php echo "Php " . $product_price . ".00"; ?></h2>
			<form method="POST">
				<div class="form-group">
					<div class="col-md-6 product-select">
						<label>Sizes:</label>
						<select class="form-control" name="product-sizes">
							<?php 
								$size_sql = "SELECT size_abbreviation FROM bacon_sizes";

								$result = mysqli_query($conn, $size_sql);

								while ($row = mysqli_fetch_assoc($result)) {
									extract($row);

									echo "<option>" . $size_abbreviation . "</option>";
								}
							 ?>
						</select>
						<label>Color:</label>
						<select class="form-control" name="product-color">
							<option>Black</option>
							<option>Grey</option>
							<option>Blue</option>
							<option>Red</option>
							<option>Green</option>
							<option>Dark Grey</option>
						</select>
						<label>Quantity:</label>
						<input type="number" name="product-quantity" id="product-quantity" min="0" class="form-control" value="0"><br><br>
						<input class="btn btn-info" type="submit" name="add-to-cart" id="add-to-cart" value="Add to Cart">
					</div>
				</div>
			</form>
		</div>
<?php
}
	echo "</div>";
}
?>
</div>
</div>
<?php
}
require_once 'index.php';
require_once '../partials/footer.php';
?>