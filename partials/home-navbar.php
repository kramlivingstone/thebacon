<div class="banner">
	<div class="logo">
		<a href="bacon-home.php"><img id="site-logo" src="../img/thebaconblack.png"></a>
	</div>
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-menu" aria-expanded="false">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="collapse-menu">
				<ul class="nav navbar-nav">
					<li><a href="bacon-home.php">HOME</a></li>
					<li><a href="bacon-store.php">STORE</a></li>
					<li><a href="#">WE ARE THE BACON</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">CART(0)</a></li>
					<?php 
				 	if (!isset($_SESSION['customer_username'])) {
				 		echo "<li><a href='bacon-login.php'>SIGN IN</a></li>";
				 	} else {
				 		echo "<li class='dropdown'>";
				 			echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button'>Hi, " . $_SESSION['customer_username'] . "</a>";
				 			echo "<ul class='dropdown-menu'>";
				 			if(isset($_SESSION['customer_username'])){
		    					echo "<li><a href='profile.php'>My Profile</a></li>";
		    					if ($_SESSION['customer_role'] == 'admin') {
		    						echo "<li><a href='admin-dashboard.php'>Admin Page</a></li>";
		    					}
		    					echo "<li><a href='bacon-logout.php'>Sign Out</a></li>";
		    				//session_unset($_SESSION['username']);
		    				} else {
		    					echo "string";
		    				}
		    				echo "</ul>";
		    			echo "</li>";
				 	}
					
					?>
				</ul>
			</div>
		</nav>
	</div>
<!-- 	<div id="search-box">
		<input id="search-textbox" type="text" class="form-control" name="search">
		<input type="submit" class="btn btn-danger" name="search_now" value="SEARCH">
	</div> -->
</div>