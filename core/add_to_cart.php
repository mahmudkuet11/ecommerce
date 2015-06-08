<?php
include 'db.php';
if(isset($_GET['check'],$_GET['id'])){
	$id = $_GET['id'];
	$res = mysql_query("SELECT * FROM products WHERE product_id='$id'");
	$row = mysql_fetch_array($res);
	if($_GET['check'] > $row['availability']){
		echo '
			<td style="color:red">out of stock. max '. $row['availability'] .'</td>
			<td></td>
		';
	}else{
		echo '
			<td></td>
			<td><a style="cursor:pointer" id="'.$id.'" class="add_to_cart" onClick="addtocart(this.id);">Add to Cart</a></td>
		';
	}
	die();
}
$product_id = array();
$product_quantity = array();
$id = $_GET['id'];
$quantity = $_GET['quantity'];
if(isset($_SESSION['product_id'],$_SESSION['product_quantity'])){
	$p_id = json_decode($_SESSION['product_id']);
	$p_qty = json_decode($_SESSION['product_quantity']);
	array_push($p_id,$id);
	array_push($p_qty,$quantity);
	$_SESSION['product_id'] = json_encode($p_id);
	$_SESSION['product_quantity'] = json_encode($p_qty);
	
}else{
	array_push($product_id,$id);
	array_push($product_quantity,$quantity);
	$_SESSION['product_id'] = json_encode($product_id);
	$_SESSION['product_quantity'] = json_encode($product_quantity);
}

echo $_SESSION['product_id'].'<br/>';
echo $_SESSION['product_quantity'];



?>