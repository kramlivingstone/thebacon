<?php 

function get_title() {
	echo "Products";
}

function display_content() {
require_once '../partials/navbar.php';
require_once '../partials/bacon-sidebar.php';
require_once '../bacon-connection.php';

$sql = "SELECT a.product_id,a.product_name,a.product_description,a.product_image,a.product_price FROM bacon_products a, bacon_status b WHERE a.status_id = b.status_id && b.status_name = 'active'";

$result = mysqli_query($conn,$sql);
?>
<div class="container-fluid">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 content">
<?php

if(mysqli_num_rows($result) > 0) {
	echo '<div class="row">';
	while ($row = mysqli_fetch_assoc($result)) {
	extract($row);
	
?>

		<div class="col-sx-12 col-sm-6 col-md-3" id="store-items">
			<div class="images">
				<a href="#" class="view-item-modal" id="<?php echo $product_id; ?>">
					<img id="<?php echo $product_id; ?>" src=<?php echo $product_image; ?>></a>
			</div>
			<div class="product-caption">
				<span><?php echo $product_name; ?></span><br>
				<span><?php echo "Php " . $product_price . ".00" ; ?></span>
			</div>
		</div>

<?php
}
	echo "</div>";
}
?>
</div>
</div>
<div id="viewModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<!-- <h4 class="modal-title"></h4> -->
			</div>
			<div class="modal-body" id="item-view">

			</div>
			<div class="modal-footer">
					<a href="#" type="submit" name="add-to-cart" id="add-to-cart" value="Add to Cart" class="btn btn-info">Add to Cart</a>
			</div>
		</div>
	</div>
</div>
<?php
}
require_once 'index.php';
require_once '../partials/footer.php';
?>

