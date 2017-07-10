<nav class="navbar navbar-default" role="navigation">
  <div class="container nav-contain">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="navbar-brand navbar-brand-centered"><a href="bacon-home.php"><img class="img-responsive"src="../img/thebaconblack.png"></a></div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-brand-centered">
      <ul class="nav navbar-nav navbar-left">
        <li><a href="bacon-store.php">Store</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">The Bacon</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#">The Bacon</a></li> -->
        <li><a href="#">Contact</a></li>
        <li><a href="bacon-login.php">Sign In</a></li>	
        <li><a href="#">Cart<span class="badge">
        <?php 
        	if(isset($_SESSION['cart']))
        	{
            foreach ($_SESSION['cart'] as $key => $value) {
              echo count($_SESSION["cart"]);
            }
        	} else {
        		echo '0';
        	}
         ?>
        </span></a></li>        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
