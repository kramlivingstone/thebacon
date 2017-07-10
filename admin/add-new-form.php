<?php 

require_once '../bacon-connection.php';
	
$user_id = $_POST['user_id'];
$message = '';

if(!empty($_POST))
{
	$fullname = mysqli_real_escape_string($conn, $_POST['add-fullname']);
	$username = mysqli_real_escape_string($conn, $_POST['add-username']);
	$password = mysqli_real_escape_string($conn, sha1($_POST['add-password']));
	$confirm_password = mysqli_real_escape_string($conn, sha1($_POST['add-confirm-password']));
	$email = mysqli_real_escape_string($conn, $_POST['add-email']);
	$status = mysqli_real_escape_string($conn, $_POST['add-status']);

	
	if($user_id != '')
	{
		if($password === $confirm_password) {
			$sql = "UPDATE bacon_users 
					SET full_name = '$fullname',
					 username = '$username',
					 password = '$password',
					 email = '$email',
					 status_id = (SELECT status_id FROM bacon_status WHERE status_name = '$status')
					 WHERE user_id='$user_id'";

			$message = "User Updated!";
		} else {
			$message = "Password does not match!";
		}
	}
	else
	{
		if($password === $confirm_password) {
		$sql = "INSERT INTO bacon_users (username,password,email,full_name,role_id,status_id)
				VALUES('$username','$password','$email','$fullname',1,1)";

			$message = "User Added!";
		} else {
			$message = "Password does not match!";
		}
	}
	if(mysqli_query($conn,$sql)) {
?>
		<label class="text-success"><?php echo $message; ?></label>
<?php
		$select_sql = "SELECT * FROM bacon_users ORDER BY user_id ASC";

		$result = mysqli_query($conn,$select_sql);
?>
		<table class="table table-bordered">
				<caption>List of Users</caption>
				<thead>
					<tr>
						<th>Full Name</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
<?php
		while($row = mysqli_fetch_assoc($result)) {
			extract($row);
?>
				<tr id="table-row">
							<td><?php echo $full_name; ?></td>
							<td class="status">
								<?php 
									$sql3 = "SELECT a.status_name FROM bacon_status a, bacon_users b WHERE a.status_id = b.status_id AND b.user_id = '$user_id'";

									$result3 = mysqli_query($conn,$sql3);
									while ($row3 = mysqli_fetch_assoc($result3)) {
										extract($row3);
									}
									echo "<span id='status-span' class='label'>" . $status_name . "</span>";
								?>
							</td>
							<td class="text-center">
								<input type="button" name="view-user" id="<?php echo $user_id; ?>" class="btn btn-success btn-xs view-data" value="View">
								<input type="button" name="edit-user" id="<?php echo $user_id; ?>" class="btn btn-info btn-xs edit-data" value="Edit">
							</td>
						</tr>
<?php
		}
?>
				</tbody>
		</table>		
<?php
	}


}
?>