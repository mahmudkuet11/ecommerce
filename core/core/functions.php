<?php
//session_start();
include 'core/db.php';
function username_from_user_id($id){
	$sql = "SELECT username FROM user WHERE user_id='$id'";
	$res = mysql_query($sql);
	while($row = mysql_fetch_array($res)){
		return $row['username'];
	}
}
function is_admin($id){
	if(username_from_user_id($id) == 'admin') return true;
	else return false;
}
function is_added_to_cart($id){
	if(isset($_SESSION['product_id'])){
		$list = json_decode($_SESSION['product_id']);
		for($i=0;$i<sizeof($list);$i++){
			if($list[$i] == $id) return true;
		}
		return false;
	}

}
function get_total_price(){
	$total = 0;
	$p_id = json_decode($_SESSION['product_id']);
	$p_qty = json_decode($_SESSION['product_quantity']);
	for($i=0;$i<sizeof($p_id);$i++){
		$product_id = $p_id[$i];
		$res = mysql_query("SELECT * FROM products WHERE product_id='$product_id'");
		$row = mysql_fetch_array($res);
		$total = $total + $row['price'] * $p_qty[$i];
	}
	return $total;
}
function get_product_id_json(){
	return $_SESSION['product_id'];
}
function get_product_quantity_json(){
	return $_SESSION['product_quantity'];
}

function get_product_id_from_order_id($order_id){
	$sql = "SELECT * FROM orders WHERE order_id='$order_id'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	$product_id = json_decode($row['product_id']);
	return $product_id;
}
function get_product_details($id,$attr){
	$sql = "SELECT * FROM products WHERE product_id='$id'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	switch($attr){
		case "name": return $row['product_name']; break;
		case "price": return $row['price']; break;
		case "model": return $row['model']; break;
		case "manufacturer": return $row['manufacturer']; break;
		case "link": return 'productdetail.php?product_id='.$id; break;
	}
}
function get_quantity($order_id,$i){
	$sql = "SELECT * FROM orders WHERE order_id='$order_id'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	$qty = json_decode($row['quantity']);
	return $qty[$i];
}
function get_customer_details($order_id,$attr){
	$sql = "SELECT * FROM orders WHERE order_id='$order_id'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	switch($attr){
		case "name": return $row['name']; break;
		case "address": return $row['address']; break;
		case "city": return $row['city']; break;
		case "country": return $row['country']; break;
		case "email": return $row['email']; break;
		case "phone": return $row['phone']; break;
	}
}
function is_received($id){
	$sql = "SELECT * FROM orders WHERE order_id='$id'";
	$res = mysql_query($sql);
	while($row = mysql_fetch_array($res)){
		if($row['order_status'] == 'received') return true;
		else return false;
	}
}
function is_completed($id){
	$sql = "SELECT * FROM orders WHERE order_id='$id'";
	$res = mysql_query($sql);
	while($row = mysql_fetch_array($res)){
		if($row['order_status'] == 'completed') return true;
		else return false;
	}
}

function get_availability($id){
	$sql = "SELECT * FROM products WHERE product_id='$id'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	return $row['availability'];
}
function reduce_quantity($id,$qty){
	$avail = get_availability($id) - $qty;
	$sql = "UPDATE products SET availability='$avail' WHERE product_id='$id'";
	mysql_query($sql);
}
function update_sell($id,$qty){
	$sql = "SELECT * FROM products WHERE product_id='$id'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	$qty = $row['sell'] + $qty;
	$sql = "UPDATE products SET sell='$qty' WHERE product_id='$id'";
	mysql_query($sql);
}





?>