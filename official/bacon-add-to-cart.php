<?php

function get_title(){
	echo "Checkout";
}

function display_content() {
require_once '../partials/navbar.php';
require_once '../bacon-connection.php';

$product_id = $_GET['id'];


// echo $product_id;

if(isset($product_id) && !empty($product_id)) {
	$_SESSION['product_id'] = $product_id;
	$_SESSION['cart'] = $_SESSION['product_id'];
	// header('location: bacon-store.php?status=success');
	echo $_SESSION['cart'];
} else {
	header('location: bacon-store.php?status=failed');
}
}
require_once 'index.php';
require_once '../partials/footer.php';
 ?>