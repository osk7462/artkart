<?php
$server = "localhost";
	$username = "osama_khan";
	$password = "";
	$database = "art_kart";	
    $con = mysqli_connect($server, $username, $password, $database);
?>


<html>
	<head>
		<title>product detail</title>
		<link rel="stylesheet" href="css/font-awesome.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="style.css">
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.js"></script>
			<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
            <script src="js/index.js"></script>
	
			<style>
			.btn {
					height:70px;
				font-size:40px;
			}
			</style>
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
			 <div class="col-md-12">
			 <ol class="breadcrumb">
			 <li><a href="home.php">Home</a></li>
			 <?php
			  $id = $_GET['item_id'];
			    $sql = "SELECT * FROM items WHERE  item_id = '$id'";
                  $run = mysqli_query($con, $sql);
              while( $rows = mysqli_fetch_assoc($run) ) 
			  {
	                $item_cat = ucwords($rows['item_cat']);
					$item_id = $rows['item_id'];
                    echo"<li><a href='catag.php?cata=$item_cat'>$item_cat</a></li>
			             <li class='active'>$rows[item_title]</li>
			";		 
			 
			 
			 ?>
			 </ol>
			 </div>
			 <div class="row">
			 <?php
			   
	  echo"
	  
	        <div class='col-md-8'>
				<h3 class='pp-title'>$rows[item_title]</h3>
				<img src='$rows[item_image]' class='img-responsive'>
				<h4 class='pp-desc-head'>Description</h4>
				<div class='pp-desc-detail'>$rows[item_description]
				</div>
				</div>
			  ";

			 }
		 ?>
			 
								<aside class="col-md-4">
				<a href="buy.php?chk_item_id=<?php echo $item_id;?>" class="btn btn-success btn-lg btn-block">BUY NOW</a>
				<br>
				<ul class="list-group">
				<li class="list-group-item">
				<div class="row">
				<div class="col-md-3"><i class="fa fa-truck fa-2x"></i></div>
				<div class="col-md-9">Delivered within 5 days</div>
				</div>
				</li>
					<li class="list-group-item">
				<div class="row">
				<div class="col-md-3"><i class="fa fa-refresh fa-2x"></i></div>
				<div class="col-md-9">Easy return in 7 days</div>
				</div>
				</li>
					<li class="list-group-item">
				<div class="row">
				<div class="col-md-3"><i class="fa fa-phone fa-2x"></i></div>
				<div class="col-md-9">call xxxxxxx</div>
				</div>
				</li>
				</ul>
				</br>
				</aside>
				</div>
				<div class="page-header">
				<h3>Related item</h3>
				</div>
				
				<div class="container">
				<div class="row">
				<?php
				$rel_sql = "SELECT * FROM items ORDER BY rand() LIMIT 8";
				$rel_run = mysqli_query($con, $rel_sql);
				while($rel_rows = mysqli_fetch_assoc($rel_run) )
				{
					$discounted = $rel_rows['item_price'] - $rel_rows['item_discount'];
					echo" 
					<div class='col-md-3'>
	         <div class='col-md-12  single-item noPadding'>
	      <div class='top'><img src='$rel_rows[item_image]'></div>
	<div class='bottom'>
	<h3 class='item-title'><a href='product.php?item_id=$rel_rows[item_id]'>$rel_rows[item_title]</a></h3>
	<div class='pull-right cutted-price text-muted'><del>$ $rel_rows[item_price]/=</del></div>
	<div class='clearfix'></div>
	<div class='pull-right discounted-price'>$ $discounted/=</div>
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
