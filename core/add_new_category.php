<?php
include 'functions.php';
if(!is_admin($_SESSION['user_id'])){
	header('Location:../login.php');
	die();
}
$name = $_POST['cat_name'];
$sql = "INSERT INTO category (category) VALUES ('$name')"; 
mysql_query($sql);
header('Location:../addproduct.php');
?>