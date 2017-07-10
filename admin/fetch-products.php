<?php 

require_once '../bacon-connection.php';

$product_id = $_POST['product_id'];

if(isset($product_id)) {
	$sql = "SELECT * FROM bacon_products 
			WHERE product_id = $product_id";

	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	echo json_encode($row);
}

 ?>