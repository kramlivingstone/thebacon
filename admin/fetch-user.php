<?php 

require_once '../bacon-connection.php';

$user_id = $_POST['user_id'];

if(isset($user_id)) {
	$sql = "SELECT * FROM bacon_users WHERE user_id = '$user_id'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	echo json_encode($row);
}


 ?>