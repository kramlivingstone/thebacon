





// STATUS

$('.status:contains("active") span').addClass('label-primary');
$('.status:contains("inactive") span').addClass('label-danger');




$(document).ready(function(){

// OFFICIAL WEBSITE PAGES

// BACON-STORE

	$(document).on('click','.view-item-modal', function(){

	var product_id = $(this).attr("id");

	 	$.ajax({
	 		url: "bacon-view.php",
	 		method: "post",
	 		data:{product_id:product_id},
	 		success:function(data){
	 			$('#item-view').html(data);		
			 	$('#viewModal').modal("show");
	 		}
	 	});
});

// ADMIN PAGES 

	 $('#add').click(function(){  
           $('#add-new').val("Add New");  
           $('#add-new-form')[0].reset(); 
           $('#user_id').val("");
      });

// MODAL: USER MANAGEMENT, UPDATE USER

	$(document).on('click','.edit-data', function(){
		var user_id = $(this).attr("id");

		$.ajax({
			url: "fetch-user.php",
			method: "POST",
			data: {user_id:user_id},
			dataType:"json",
			success:function(data) {
				$('#add-fullname').val(data.full_name);
				$('#add-username').val(data.username);
				$('#add-email').val(data.email);
				// $('#add-status').val(data.status_name);
				$('#user_id').val(data.user_id);
				$('#add-new').val("Update");
				$('#addDataModal').modal('show');
				$('.status:contains("active") span').addClass('label-primary');
				$('.status:contains("inactive") span').addClass('label-danger');
				
			}
		});
	});

// MODAL: USER MANAGEMENT, ADD NEW USER

	$('#add-new-form').on('submit', function(event){
		event.preventDefault();
		if($('#add-fullname').val() == "") {
			alert("Name is required!");
		}
		else if($('#add-username').val() == "") {
			alert("Username is required!");
		}
		else if($('#add-password').val() == "") {
			alert("Password is required!");
		}
		else if($('#add-confirm-password').val() == "") {
			alert("Confirm password is required!");
		}
		else if($('#add-email').val() == "") {
			alert("E-mail Address is required!");
		}
		else if($('#add-status').val() == "") {
			alert("Status is required!");
		} else {
			$.ajax({
				url:"add-new-form.php",
				method:"POST",
				data: $('#add-new-form').serialize(),
				success:function(data)
				{	
					$('#add-new-form')[0].reset();
					$('#addDataModal').modal('hide');
					$('#users-table').html(data);
					$('.status:contains("active") span').addClass('label-primary');
					$('.status:contains("inactive") span').addClass('label-danger');
				}
			});
		}
	});

// MODAL: USER MANAGEMENT, VIEW USER

	$(document).on('click','.view-data',function(){
	 	var user_id = $(this).attr("id");

	 	$.ajax({
	 		url: "view-user-form.php",
	 		method: "post",
	 		data:{user_id:user_id},
	 		success:function(data){
	 			$('#employee-detail').html(data);		
			 	$('#dataModal').modal("show");
	 		}
	 	});
	 });


// MODAL: PRODUCT MANAGEMENT, VIEW ITEM

	$(document).on('click','.view-product-data',function(){
		var product_id = $(this).attr("id");

		$.ajax({
			url: "view-item-form.php",
			method: "post",
			data: {product_id:product_id},
			success:function(data) {
				$('#product-detail').html(data);
				$('#dataModal').modal("show");
			}
		});
	});
});

// MODAL: PRODUCT MANAGEMENT, EDIT ITEM

	$(document).on('click','.edit-product-data', function(){
		var product_id = $(this).attr("id");

		$.ajax({
			url: "fetch-products.php",
			method: "POST",
			data: {product_id:product_id},
			dataType:"json",
			success:function(data) {
				$('#product-name').val(data.product_name);
				$('#product-description').val(data.product_description);
				$('#item-image').val(data.product_image);
				$('#product-price').val(data.product_price);
				$('#product_id').val(data.product_id);
				$('#insert').val("Update");
				$('#addProductModal').modal('show');
				$('.status:contains("active") span').addClass('label-primary');
				$('.status:contains("inactive") span').addClass('label-danger');
				
			}
		});
	});

// MODAL UPLOAD IMAGE

// $(document).ready(function(){
// 	$(document).on('click')
// });