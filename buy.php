
<?php
	$server = "localhost";
	$username = "osama_khan";
	$password = "";
	$database = "art_kart";
    $con = mysqli_connect($server, $username, $password, $database);
	if ( isset($_GET['chk_item_id']) )
	{
		$date = date('Y-m-d h:i:s');
		$rand_num = mt_rand();
		if( isset($_SESSION['ref']) ) {
			
		}else{
		$_SESSION['ref'] = $date.'__'.$rand_num;
		}
		$chk_sql = "INSERT INTO checkout (chk_item, chk_ref, chk_timing,chk_qty) VALUES ('$_GET[chk_item_id]', '$_SESSION[ref]', '$date', 1)";
		if(mysqli_query($con, $chk_sql)) {
			?><script>Window.location = "buy.php";</script><?php
		}
	}
	if( isset($_POST['order_submit']) ) {
		$name = mysqli_real_escape_string($con, strip_tags($_POST['name']));
		$email = mysqli_real_escape_string($con, strip_tags($_POST['email']));
	$contact = mysqli_real_escape_string($con, strip_tags($_POST['contact']));
	$state = mysqli_real_escape_string($con, strip_tags($_POST['state']));
	$delivery_address = mysqli_real_escape_string($con, strip_tags($_POST['delivery_address']));
	$order_ins_sql = "INSERT INTO orders (order_name, order_email, order_contact, order_state, order_del_add, order_checkout)
	VALUES('$name', '$email', '$contact', '$state', '$delivery_address', '$_SESSION[ref]')";
	mysqli_query($con, $order_ins_sql);
	}
?>


<html>
	<head>
		<title>shoping cart</title>
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/font-awesome.css">
			<link rel="stylesheet" href="style.css">
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.js"></script>
			<script>
			function ajax_func() {
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function()
				{
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById('get_process_data').innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open('GET', 'buy_p.php', true );
				xmlhttp.send();
				
			}
			function del_func(chk_id) {
				alert(chk_id);
				xmlhttp.onreadystatechange = function() {
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById('get_process_data').innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open('GET', 'buy_p.php?chk_del_id='+chk_id, true );
				xmlhttp.send();
				
				
				}
				function up_chk_qty(chk_qty, chk_id){
									xmlhttp.onreadystatechange = function() {
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById('get_process_data').innerHTML = xmlhttp.responseText;
					}
				
									}
				xmlhttp.open('GET', 'buy_p.php?up_chk_qty='+chk_qty+'&up_chk_id='+chk_id, true );
				xmlhttp.send();
									
				
				}
				
					
			</script>
</head>
<body onload="ajax_func();">
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
<div class="page-header">
<h2 class="pull-left">checkout</h2>
<div class="pull-right"><button class="btn btn-sucess" data-toggle="modal" data-target="#proceed_modal" data-backdrop="static" data-keyboard="false">proceed</button></div>
<!-- the proceed form's modal-->
<div id="proceed_modal" class="modal fade">
<div class="modal-dialoge modal-md">
<div class="modal-content">
<div class="modal-header">
<button class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form method="post">
<div class="form-group">
<label for="name">name</label>
<input  type="text" id="name" name="name" class="form-control" placeholder="full name">
</div>
<div class="form-group">
<label for="email">email address</label>
<input  type="email" id="email" name="email" class="form-control" placeholder="Email">
</div>
<div class="form-group">
<label for="contact">contact number</label>
<input  type="text" id="contact" name="contact" class="form-control" placeholder="contact number">
</div>
<div class="form-group">
<label for="state">states</label>
<input  list="states" name="state" id="state" class="form-control">
<datalist id="states">
<option>delhi</option>
<option>mumbai</option>
<option>lukhnow</option>
<option>jaipur</option>
<option>punjab</option>
<option>up</option>
<option>haryana</option>
</datalist>
</div>
<div class="form-group">
<label for="address">delivery address</label>
<textarea class="form-control" name="delivery_address"></textarea>
</div>
<div class="form-group">
<input   type="submit" name="order_submit" class="btn btn-danger btn-block">
</div>




</form>





</div>
<div class="modal-footer">
<button class="btn btn-default" data-dismiss="modal">close</button>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>
</div>
<div class="panel panel-default">
<div class="panel-heading">order detail</div>
<div class="panel-body">
<table class="table">
<thead>
<tr>
<th>s.no</th>
<th>item</th>
<th>qty</th>
<th width="5%">delete</th>
<th class="text-right">price</th>
<th class="text-right">total</th>

</tr>
</thead>
<tbody id="get_process_data">
<!--the buy -->
</tbody>
</table>
</div>
</div>
</div>
<br><br><br><br>	
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
