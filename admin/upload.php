<?php 

function get_title() {
	echo "Image Upload";
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
	
	$id = $_GET['id'];

	$message = '';
	if(isset($_POST['submitImage'])) {
		$target_dir = "../img/";
		$target_file = $target_dir . basename($_FILES["product-image"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submitImage"])) {
			if(empty($_POST["product-image"]))
			{
				$message = "Please select a File" . "<br><br>" . "<a href='upload-image.php?id=$id' class='btn btn-primary'>Return to Upload Page</a>";
			} else {
			    $check = getimagesize($_FILES["product-image"]["tmp_name"]);
			    if($check !== false) {
			        $message = "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        $message = "File is not an image.";
			        $uploadOk = 0;
			    }
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    $message = "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["product-image"]["size"] > 500000) {
		    $message = "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		   $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    $message = "Sorry, your file was not uploaded." . "<br><br>" . "<a href='upload-image.php?id=$id' class='btn btn-primary'>Return to Upload Page</a>"; 
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["product-image"]["tmp_name"], $target_file)) {
		        $message = "The file ". basename( $_FILES["product-image"]["name"]). " has been uploaded!" . "<br>" . "<a href='edit-product.php?id=$id' class='btn btn-primary' name='goBack' id='goBack'> Return to the Previous Menu </a>";
		        // $_SESSION['product-image'] = $target_file;

		        $update_sql = "UPDATE bacon_products SET product_image = '$target_file' WHERE product_id = $id";
		        mysqli_query($conn,$update_sql);
		    } else {
		        $message = "Sorry, there was an error uploading your file.";
		    }
		}
	}
}
?>
	 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-header">
				<h3>Image Upload</h3>
			</div>
			<label><?php echo $message; ?></label>
			<hr>
			<div class="panel-body">
			
			</div>
		</div>
	</div>
<?php
}
require_once 'admin-index.php';
 ?>

