<?php include "includes/db.php";
if( isset($_POST['item_submit']) ) {
	$item_name = mysqli_real_escape_string($con, strip_tags($_POST['item_name']));
$item_description = mysqli_real_escape_string($con, $_POST['item_description']);
$item_catagory = mysqli_real_escape_string($con, strip_tags($_POST['item_catagory']));
	$item_qty = mysqli_real_escape_string($con, strip_tags($_POST['item_qty']));
     $item_cost = mysqli_real_escape_string($con, strip_tags($_POST['item_cost']));
	 $item_price = mysqli_real_escape_string($con, strip_tags($_POST['item_price']));
	 $item_discount = mysqli_real_escape_string($con, strip_tags($_POST['item_discount']));
	 $item_delivery = mysqli_real_escape_string($con, strip_tags($_POST['item_delivery']));
	if( isset($_FILES['item_image']['name']))
	{
		$file_name = $_FILES['item_image']['name'];
		$path_address = "../itemp/$file_name";
		$path_address_db = "itemp/$file_name";
$img_confirm = 1;
$file_type = pathinfo($_FILES['item_image']['name'], PATHINFO_EXTENSION);
if($_FILES['item_image']['size'] > 6000000) {
	$img_confirm = 0;
	echo 'size is big';
}
if($file_type != 'jpg' && $file_type != 'png' && $file_type != 'gif') {
	$img_confirm = 0;
	echo 'type is not match';
}
if($img_confirm == 0) {
	
}
else {
	if(move_uploaded_file($_FILES['item_image']['tmp_name'],$path_address) ){
		$item_ins_sql = "INSERT INTO items (item_image, item_title, item_description, item_cat,
		 item_qty, item_cost, item_price, item_discount, item_delv) VALUES ('$path_address_db', 
		'$item_name', '$item_description', '$item_catagory', '$item_qty', '$item_cost', 
		'$item_price', '$item_discount', '$item_delivery');";
		$item_ins_run = mysqli_query($con, $item_ins_sql);
	}
}
	}
}


 ?>
<!DOCTYPE html>
<html>
<head>
    <title>item-list| Admin Panel</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/admin_style.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
	<script>
	function get_item_list_data() {
		xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function()
				{
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById('get_item_list_data').innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open('GET', 'item_list_process.php', true );
				xmlhttp.send();
				
			}
			function del_item(item_id) {
				xmlhttp.open('GET', 'item_list_process.php?del_item_id='+item_id, true);
				xmlhttp.send();
			}
</script>
	</head>
	<body onload="get_item_list_data();">
		<?php include "includes/header.php"; ?>
		<div class="container"></div>
		<button class="btn btn-danger" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#add_new_item">Add new item</button>
		<div id="add_new_item" class="modal fade">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal_header">
		<button class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Add New Item</h4>
		</div>
		<div class="modal-body">
		<form method="post" enctype="multipart/form-data">
		<div class="form-group">
		<label>item image</label>
		<input type="file" name="item_image" class="form-control">
		</div>
		
		<div class="form-group">
		<label>item name</label>
		<input type="text"  name="item_name" class="form-control">
		</div>
		
		<div class="form-group">
		<label>item description</label>
		<textarea name="item_description" class="form-control"></textarea>
		</div>
		
		<div class="form-group">
		<label>item catagory</label>
		<select class="form-control" name="item_catagory">
		<option>select a catagory</option>
		<?php
		$cat_sql = "SELECT * FROM item_cat";
		$cat_run = mysqli_query($con, $cat_sql);
		while($cat_rows = mysqli_fetch_assoc($cat_run) ) {
			$cat_name = ucwords($cat_rows['cat_name']);
			if($cat_rows['cat_slug'] == '') {
				$cat_slug = $cat_rows['cat_name'];
			}
			else {
				$cat_slug = $cat_rows['cat_slug'];
			}
			echo"  
			
			    <option value='$cat_slug'>$cat_name</option>
		";
			
			
		}
		
		?>
		
		
		</select>
		</div>
		
		<div class="form-group">
		<label>item quantity</label>
		<input type="number" name="item_qty" class="form-control">
		</div>
		
		<div class="form-group">
		<label>item cost</label>
		<input type="number" name="item_cost" class="form-control">
		</div>
		
		<div class="form-group">
		<label>item price</label>
		<input type="number" name="item_price" class="form-control">
		</div>
		
		<div class="form-group">
		<label>item discount</label>
		<input type="number" name="item_discount" class="form-control">
		</div>
		
		<div class="form-group">
		<label>item delivery</label>
		<input type="number" name="item_delivery" class="form-control">
		</div>
		
	<div class="form-group">
		<input type="submit" name="item_submit" class="btn btn-primary btn-block">
		</div>
		
		</form>
		</div>
		<div class="modal-footer">
		<button class="btn btn-danger" data-dismiss="modal">Close</button> 
		</div>
		</div>
		</div>
		</div>
		<div id="get_item_list_data">	
		</div>
		<div class="clearfix"></div>
		</div><br><br><br><br><div class="clearfix"></div>
		</div><br><br><br>
		<?php include "includes/footer.php"; ?>
	</body>
	</html>
	
	
	