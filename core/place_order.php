<?php
include 'db.php';
include 'functions.php';
$user_id = $_SESSION['user_id'];
$name = $_POST['name'];
$address = $_POST['address'];
$city = $_POST['city'];
$country = $_POST['country'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$order_status = 'pending';
$total_price = get_total_price();
$product_id = get_product_id_json();
$order_time = gmdate("d M Y g:i:s a",time()+6*60*60);
$quantity = get_product_quantity_json();
$sql = "INSERT INTO orders (user_id,name,address,city,country,email,phone,order_status,total_price,product_id,order_time,quantity) VALUES('$user_id','$name','$address','$city','$country','$email','$phone','$order_status','$total_price','$product_id','$order_time','$quantity')";
$res = mysql_query($sql);
if($res){
	$_SESSION['product_id'] = '[]';
	$_SESSION['product_quantity'] = '[]';
	header("Location:../info.php?msg=suc");
	die();
}else{
	header("Location:../info.php?msg=error");
}

?>