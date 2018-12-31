<?php include 'includes/db.php';
if( isset($_REQUEST['del_item_id']) ) {
$del_sql = "DELETE FROM items WHERE item_id = '$_REQUEST[del_item_id]' ";
mysqli_query($con, $del_sql);

}
 ?>
<table class=" table table-bordered table-striped ">
		<thead>
		<tr class="item-head">
		<th>s.no</th>
		<th>image</th>
		<th>item title</th>
		<th>item description</th>
		<th>item catagory</th>
		<th>item qty</th>
		<th>itm cost</th>
		<th>item price</th>
		<th>item discount</th>
		<th>item delivery</th>
		<th>Action</th>
		</tr>
		</thead>
		<tbody>
		 <?php 
		 $c =1;
		 $sel_sql = "SELECT * FROM items";
		 $sel_run = mysqli_query($con, $sel_sql);
		 while($rows = mysqli_fetch_assoc($sel_run) ) {
			 $discounted_price = $rows['item_price'] - $rows['item_discount'];
			 echo"
			 <tr>
			 <td>$c</td>
			 <td><img src='../$rows[item_image]' style='width:60px;'></td>
			 <td>$rows[item_title]</td>
			<td>"; echo strip_tags($rows['item_description']); echo "</td>
			<td>$rows[item_cat]</td>
			<td>$rows[item_qty]</td>
			<td>$rows[item_cost]</td>
			<td>$rows[item_discount]</td>
			<td>$discounted_price($rows[item_price])</td>
			<td>$rows[item_delv]</td>
<td>
<div class='dropdown'>
<button class='btn btn-danger dropdown-toggle'
 data-toggle='dropdown'>Actions <span class='caret'></button>
 <ul class='dropdown-menu dropdown-menu-right'>
 <li>
 <a href='#edit_modal' data-toggle='modal'>Edit</a>
 </li>";
 ?>
 
 <li><a href="javascript:;" onclick="del_item(<?php echo $rows['item_id']; 
 ?>);">Delete</a></li>
 <?php echo "</ul>
</div>
<div class='modal fade' id='edit_modal'>
   <div class='modal-dialoge'>
<div class='modal-content'>
     <div class='modal-header'>header</div> 
<div class='modal-body'>body</div>
<div class='modal-footer'>footer</div>	
</div>
</div>
</div>
</td>
		</tr>
		";
		$c++;
		 }
		?>
		</tbody>
		
		</table>
		