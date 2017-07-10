<?php 
	
	require_once '../bacon-connection.php';

	$user_id = $_POST['user_id'];

	if(isset($user_id))
	{
		$sql = "SELECT * FROM bacon_users WHERE user_id = '$user_id'";

		$result = mysqli_query($conn,$sql);

		while ($row = mysqli_fetch_assoc($result)) {
			extract($row);
		}
?>
		<div class="row">
			<div class="col-md-12">
				<p>
					<strong>User ID: </strong> 
					<?php echo $user_id; ?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p>
					<strong>Full Name: </strong> 
					<?php echo $full_name; ?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p>
					<strong>E-mail Address: </strong> 
					<?php echo $email; ?>
				</p>
			</div>
		</div>

<?php
	}

 ?>