<?php 

function get_title() {
	echo "Cart";
}

function display_content() {
// require_once '../partials/navbar.php';
require_once '../bacon-connection.php';

foreach ($_SESSION['cart'] as $key => $value) {
	$sql = "SELECT * FROM bacon_)products WHERE product_id = '$key'";

	$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				extract($row);
					var_dump($_SESSION['cart']);
			}
		}
	}



?>

<p>test</p>
<div class="row">
	  <table class="table">
	  	<tr>
	  		<th>S.NO</th>
	  		<th>Item Name</th>
	  		<th>Price</th>
	  	</tr>
		
	  	<tr>
	  		<td>Item number</td>
	  		<td><a href="delcart.php?remove=">Remove</a> Item Name</td>
	  		<td>$1000</td>
	  	</tr>
		<tr>
			<td><strong>Total Price</strong></td>
			<td><strong>$1000</strong></td>
			<td><a href="#" class="btn btn-info">Checkout</a></td>
		</tr>
	  </table>
</div>


<?php
require_once '../partials/footer.php';

}

require_once 'index.php';
 ?>