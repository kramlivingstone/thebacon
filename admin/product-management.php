<?php 

if(isset($_POST['add-new'])) {
	header('location:add-new-item.php');
}


function get_title() {
	echo "Product Management";
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

	$sql = "SELECT * from bacon_products ORDER BY product_id ASC";

	$result = mysqli_query($conn,$sql);

	// if(isset($_POST['add-product'])) {
	// 	header('location:add-new-item.php');
	// }


?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
	<div class="content">
		<div class="container-fluid">
			<h1>Product Management</h1>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<form method="POST">
						<input type="button" class="btn btn-primary" name="add-product" id="add-product" data-toggle="modal" data-target="#addProductModal" value="Add New">
					</form>
					<div id="product-table">
						<table class="table table-bordered">
							<caption>List of Products</caption>
							<thead>
								<tr>
									<th>Product ID</th>
									<th>Product Name</th>
									<th>Featured</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
<?php 
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
extract($row);
?>
								<tr>
									<td><?php echo $product_id; ?></td>
									<td><?php echo $product_name; ?></td>
									<td>
										
									</td>
									<td class="status">
									<?php 
										$status_sql = "SELECT a.status_name FROM bacon_status a, bacon_products b WHERE a.status_id = b.status_id AND b.product_id = '$product_id'";

										$result_status = mysqli_query($conn,$status_sql);

										if(mysqli_num_rows($result_status) > 0) {
											while($row = mysqli_fetch_assoc($result_status)) {
												extract($row);

												echo "<span id='status-span' class='label'>" . $status_name . "</span>";
											}
										}
									?>									
									</td>
									<td class="text-center">
										<form method="POST">
											<input type="button" name="view-item" id="<?php echo $product_id; ?>" class="btn btn-success btn-xs view-product-data" value="View">
											<a href="edit-product.php?id=<?php echo $product_id; ?>" class="btn btn-primary btn-xs adjust">Edit</a>
										</form>
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
				<h4 class="modal-title">Item Details</h4>
			</div>
			<div class="modal-body" id="product-detail">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div id="addProductModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">The Bacon Products</h4>
			</div>
			<div class="modal-body" id="item-detail">
				<form method="POST" id="add-new-item-form" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<label>Item Name:</label>
							<input type="text" name="product-name" id="product-name" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label>Item Description:</label>
							<input type="text" name="product-description" id="product-description" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 form-group">
							<label for="product-price">Item Price:</label>
							<div class="input-group">
								<div class="input-group-addon">Php</div>
								<input type="text" class="form-control" name="product-price" id="product-price">
								<div class="input-group-addon">.00</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<input type="hidden" name="product_id" id="product_id">
							<input type="submit" name="insert" id="insert" value="Add Item" class="btn btn-success">
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