<?php
include 'db.php';
include 'functions.php';
$order_id = $_GET['id'];
$status = $_GET['status'];
$sql = "UPDATE orders SET order_status='$status' WHERE order_id='$order_id'";
mysql_query($sql);
if($status == 'completed'){
	$product_id = get_product_id_from_order_id($order_id);
	for($i = 0; $i < sizeof($product_id); $i++){
		reduce_quantity($product_id[$i],get_quantity($order_id,$i));
		update_sell($product_id[$i],get_quantity($order_id,$i));
	}
}


?>