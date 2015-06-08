<?php
include 'db.php';
$id = $_GET['id'];
$sql = "DELETE FROM products WHERE product_id='$id'";
mysql_query($sql);
header("Location:../products.php");
?>