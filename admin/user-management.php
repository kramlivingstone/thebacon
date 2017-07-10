<?php 

function get_title() {
	echo "User Management";
}


function display_content() {

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
?>
	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="admin-logo text-center">
				<h2>
					<a href="admin-login.php"><img class="img-responsive" src="../img/thebaconblack.png"></a>
				</h2>
			</div>
		</div>
	</div>	
	<div class="panel panel-default">
		<div class="panel-body">
			<p class="text-center">You do not have administrator privileges to access this page!</p>
		</div>
	</div>
</div>

<?php
require_once '../partials/admin-footer.php';

} else {

	require_once '../partials/admin-sidenav.php';	

	require_once '../bacon-connection.php';

$name = "";
// $role = "";

if(isset($_POST['btn-search'])) {
	$name = $_POST['search_user'];
}

 // OR b.role_name LIKE '%$role%'"

$sql = "SELECT * FROM bacon_users WHERE full_name LIKE '%$name%'";

$result = mysqli_query($conn,$sql);


?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
<div class="content">
	<div class="container-fluid">
		<h1>User Management</h1>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<form method="POST">
					<div class="form-group">
						<input id="search-box" type="text" class="form-control" name="search_user" placeholder="Search for a user">
						<input class="btn btn-primary" type="submit" name="btn-search" value="Search">
						<input  type="button" class="btn btn-success float-right" name="add" id="add" data-toggle="modal" data-target="#addDataModal" value="Add New">
					</div>
				</form>
		<div id="users-table">
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
if(mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
extract($row); 
?>

						<tr id="table-row">
							<td><?php echo $full_name; ?></td>
							<td class="status text-center">
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
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div id="dataModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">User Details</h4>
			</div>
			<div class="modal-body" id="employee-detail">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div id="addDataModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New User</h4>
			</div>
			<div class="modal-body" id="user-detail">
				<form method="POST" id="add-new-form">
					<div class="row">
						<div class="col-md-6 form-group">
							<label>Full Name:</label>
							<input type="text" name="add-fullname" id="add-fullname" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 form-group">
							<label>Username:</label>
							<input type="text" name="add-username" id="add-username" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 form-group">
							<label>Password:</label>
							<input type="text" name="add-password" id="add-password" class="form-control">
						</div>
						<div class="col-md-6 form-group">
							<label>Confirm Password:</label>
							<input type="text" name="add-confirm-password" id="add-confirm-password" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<label>Email Address:</label>
							<input type="text" name="add-email" id="add-email" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<label>Status:</label>
							<select id="add-status" name="add-status" class="form-control">
								<?php 
									$sql_combo = "SELECT * FROM bacon_status";

									$result_combo = mysqli_query($conn,$sql_combo);

									while($row = mysqli_fetch_assoc($result_combo)){
										extract($row);
										echo "<option>" . $status_name . "</option>";
									}
								 ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<input type="hidden" name="user_id" id="user_id">
							<input type="submit" name="add-new" id="add-new" value="Add New" class="btn btn-success">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<?php
}
}

}
require_once 'admin-index.php';
?>

