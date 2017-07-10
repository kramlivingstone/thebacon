<?php 
function get_title() {
	echo "TheBacon";
}

function display_content() {
require_once '../bacon-connection.php';

$select_sql = "SELECT * FROM bacon_products LIMIT 3";

$result = mysqli_query($conn, $select_sql);

if(mysqli_num_rows($result) > 0 ) {
?>

<div class="content">
	<div class="banner">
		<!-- <img class="img-responsive" src="../img/surfer2.jpg" alt ="Surfer"> -->
	</div>
	<hr>
	<div>
		<div class="new-arrival">
			<h4>Featured Shirts</h4>
			<div class="row">

<?php
	while ($row = mysqli_fetch_assoc($result)) {
		extract($row);

?>
				<div class="col-sm-12 col-md-4" id="home-thumbnails">
					<div class="thumbnail thumbnail-home">
						<img src="<?php echo $product_image; ?>" alt="images">		
					</div>
					<label class="thumbnail-home-label"><?php echo $product_name; ?></label>
				</div>
<?php		
	}
?>

			</div>
		</div>
	</div>
	<div>
		<div class="blog-area">
			<h4>Blogs</h4>
			<div class="row">
				<div class="col-sm-12 col-md-4">
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
}
}
require_once 'index.php';
require_once '../partials/footer.php';
 ?>