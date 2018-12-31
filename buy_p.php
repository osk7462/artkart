<?php
	$server = "localhost";
	$username = "osama_khan";
	$password = "";
	$database = "art_kart";
    $con = mysqli_connect($server, $username, $password, $database);
?>

<?php
session_start();
if( isset($_REQUEST['chk_del_id']) ){
$chk_del_sql = "DELETE FROM checkout WHERE chk_id = '$_REQUEST[chk_del_id]'";
$chk_del_run = mysqli_query($con, $chk_del_sql);
}
if( isset($_REQUEST['up_chk_qty']) ) {
	$up_chk_qty_sql = "UPDATE checkout SET chk_qty = '$_REQUEST[up_chk_qty]' WHERE chk_id = '$_REQUEST[up_chk_id]'";
	$up_chk_qty_run = mysqli_query($con, $up_chk_qty_sql);
	
	
}
$sub_total = 0;
$del_ch = 0;
$c = 1;
$chk_sel_sql = "SELECT * FROM checkout c JOIN items i ON c.chk_item = i.item_id"; 
$chk_sel_run = mysqli_query($con, $chk_sel_sql);
while($chk_sel_rows = mysqli_fetch_assoc($chk_sel_run) )
{
	$discounted_price = $chk_sel_rows['item_price'] - $chk_sel_rows['item_discount'];
 $total = $discounted_price * $chk_sel_rows['chk_qty'];
 $sub_total += $total;
 $del_ch += $chk_sel_rows['item_delv'];
	echo"<tr>
<td>$c</td>
<td>$chk_sel_rows[item_title]</td>
";
 ?>	
<td><input type='number' style='width: 45px;' onblur="up_chk_qty(this.value, '<?php echo $chk_sel_rows['chk_id'];?>');" value='<?php echo $chk_sel_rows['chk_qty']; ?>'></td>
<td><button class='btn btn_danger btn_sm' onclick="del_func(<?php echo $chk_sel_rows['chk_id']; ?>);">delete</button></td>
<?php echo"<td class='text-right'>$discounted_price/=</td>
<td class='text-right'><b>$total/=</b></td>
</tr>
";
$c++;
}
$_SESSION['grand_total'] = $sub_total + $del_ch;
echo"
<table class='table'>
<thead>
<tr>
<th class='text-center' colspan='8'>order summary</th>
</tr>
</thead>
<tbody>
<tr>
<td>subtotal</td>
<td class='text-right' colspan='8'><b>$sub_total/=</b></td>
</tr>
<tr>
<td>delivery charges</td>
<td class='text-right' colspan='8'><b>$del_ch/=</b></td>
</tr>
<tr>
<td>grand total</td>
<td class='text-right' colspan='8'<b>$_SESSION[grand_total]/=</b></td>
</tr>
</tbody>
</table>
";
?>
