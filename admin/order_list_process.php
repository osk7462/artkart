<?php include "includes/db.php"; 


?>

<table class=" table table-bordered table-striped ">
		<thead>
		<tr class="item-head">
		<th>s.no</th>
		<th>Buyer Name</th>
		<th>Buyer Email</th>
		<th>Buyer Contact</th>
		<th>Buyer State</th>
		<th>Delivery Address</th>
		<th>Order ref</th>
		<th class="">Order Status</th>
		</tr>
		</thead>
		<tbody>
		<?php 
		$c = 1;
		$sql = "SELECT * FROM orders";
		$run = mysqli_query($con, $sql);
		while($rows = mysqli_fetch_assoc($run) ) {
echo "
			<tr>
			<td>$c</td>
			<td>$rows[order_name]</td>
			<td>$rows[order_email]</td>
			<td>$rows[order_contact]</td>
			<td>$rows[order_state]</td>
			<td>$rows[order_del_add]</td>
			<td>$rows[order_checkout]</td>
			<td class='text-center'><button 
			class='btn btn-warning btn-block
			 btn-sm'>Sent</button></td>
			 </tr>
		";
			 $c++;
		}
		?>
		
		</tbody>
		</table>

		