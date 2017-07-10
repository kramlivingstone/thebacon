<?php 

require_once '../bacon-connection.php';

$product_id = $_POST['product_id'];

if(isset($product_id)) {

	$select_sql = "SELECT * FROM bacon_products WHERE product_id = '$product_id'";

	$result = mysqli_query($conn, $select_sql);

	while ($row = mysqli_fetch_assoc($result)) {
		extract($row);
	}
?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<img id="product-image" class="img-responsive" src="<?php echo $product_image; ?>" alt="product-image">
			</div>
			<div class="col-md-6">
				<strong class="product-name"><?php echo $product_name; ?></strong>
			</div>
			<div class="col-md-6">
				<h3><?php echo "Php " . $product_price . ".00"; ?></h3>
			</div>
			<div class="col-md-6">
				<span>Full Details <a id="view-full-details" href="bacon-product-display.php?id=<?php echo $product_id; ?>">here</a></span>
			</div>
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
						<input type="number" name="product-quantity" id="product-quantity" min="0" class="form-control" value="0">
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
}


 ?>