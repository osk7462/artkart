<?php include "includes/db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>artkart | Admin Panel</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/admin_style.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script>
		function get_order_list() {
		xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function()
				{
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById('get_order_list_data').innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open('GET', 'order_list_process.php', true );
				xmlhttp.send();
				
			}
			
			
			</script>
	
	</head>
	<body onload="get_order_list();">
		<?php include "includes/header.php"; ?>
		<div class="container">
		<div id="get_order_list_data">
		
		</div>
		</div>
		<?php include "includes/footer.php"; ?>
	
	</body>
	</html>
