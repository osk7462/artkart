
<?php
	$server = "localhost";
	$username = "osama_khan";
	$password = "";
	$database = "art_kart";
    $con = mysqli_connect($server, $username, $password, $database);
?>
<html>
<head>
    <title>artkart</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	</head>
	<body>
	<nav class="navbar navbar-inverse">
	<div class="container-fluid">
	<div class="navbar-header">
	<a href="" class="navbar-brand">online shopping</a>
	</div>
	<ul class="nav navbar-nav">
	<li><a href="home.php">home</a></li>
	<?php
	$cat_sql ="SELECT * FROM item_cat";
	$cat_run = mysqli_query($con, $cat_sql);
	while($cat_rows = mysqli_fetch_assoc($cat_run) )
	{
	$cat_name = ucwords($cat_rows['cat_name']);
	$cat_slug = $cat_rows['cat_slug'];
	echo"<li><a href ='catag.php?cata=$cat_slug'>$cat_name</a></li>";
	}
	
	?>
	</ul>
	<ul class="nav navbar-nav navbar-right">
	<li><a href="register/logout.php">logout</a></li>
	
	</ul>
	</div>
	</nav>
        <div class="container">
	      <div class="row">
		  <?php
		  $sql = "SELECT * FROM items";
		  $run = mysqli_query($con, $sql);
		  while($rows = mysqli_fetch_assoc($run) ){
					$discounted_price = $rows['item_price'] - $rows['item_discount'];
					$id = $rows['item_id'];
			 echo"      
			  <div class='col-md-3'>
	         <div class='col-md-12  single-item noPadding'>
	      <div class='top'><img src='$rows[item_image]' class='img-responsive' ></div>
	<div class='bottom'>
	<h3 class='item-title'><a href='product.php?item_id=$id'>$rows[item_title]</a></h3>
	<div class='pull-right cutted-price text-muted'><del>$ $rows[item_price]/=</del></div>
	<div class='clearfix'></div>
	<div class='pull-right discounted-price'>$ $discounted_price/=</div>
</div>
	</div>
	</div>
	";
		  }
			 ?>
	<div class="clearfix"></div>
	</div><br><br><br><br>
	<footer class="navbar navbar-inverse navbar-fixed-bottom">
	<div class="container-fluid">
	<ul class="nav navbar-nav">
	<li><a href="#">Terms and conditions</a></li>
	<li><a href="#">About us</a></li>
	<li><a href="#">privacy</a></li>
	<li><a href="#">Return policy</a></li>
	</ul>
	</div>
	</footer>
	</body>
	</html>
	
