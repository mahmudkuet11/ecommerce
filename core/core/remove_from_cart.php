<?php
session_start();
if(isset($_GET['get']) && $_GET['get'] = 'total'){
	include 'db.php';
	$total = 0;
	$p_id = json_decode($_SESSION['product_id']);
	$p_qty = json_decode($_SESSION['product_quantity']);
	for($i=0;$i<sizeof($p_id);$i++){
		$product_id = $p_id[$i];
		$res = mysql_query("SELECT * FROM products WHERE product_id='$product_id'");
		$row = mysql_fetch_array($res);
		$total = $total + $row['price'] * $p_qty[$i];
	}
	$_SESSION['total_price'] = $total;
	echo $total;
	die();
}
$id = $_GET['id'];
$p_id = json_decode($_SESSION['product_id']);
$p_qty = json_decode($_SESSION['product_quantity']);
$new_id = array(); $new_qty = array();
for($i=0;$i<sizeof($p_id);$i++){
	if($p_id[$i] != $id){
		array_push($new_id,$p_id[$i]);
		array_push($new_qty,$p_qty[$i]);
	}
}
$_SESSION['product_id'] = json_encode($new_id);
$_SESSION['product_quantity'] = json_encode($new_qty);
echo $_SESSION['product_id'].'<br/>';
echo $_SESSION['product_quantity'];



?>