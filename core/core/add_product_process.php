<?php
include 'functions.php';
/*if(!is_admin($_SESSION['user_id'])){
	header('Location:../login.php');
	die();
}*/
$name = $_POST['product_name'];
$desc = $_POST['product_description'];
$price = $_POST['price'];
$avail = $_POST['availability'];
$model = $_POST['model'];
$manufacturer = $_POST['manufacturer'];
$cat = $_POST['category'];
if(isset($_POST['featured'])){
	$featured = "yes";
}else{
	$featured = "no";
}
$image_link = "";
if($_FILES['image_file']['error'] > 0){
	echo 'error';
}else{
	
	$prefix = $_SESSION['user_id'].time();
	$link = "../upload/" .$prefix. $_FILES["image_file"]["name"];
	move_uploaded_file($_FILES["image_file"]["tmp_name"],$link);
	$image_link = "http://localhost/project/upload/".$prefix. $_FILES["image_file"]["name"];
}
$sql = "INSERT INTO products (product_name,description,price,availability,model,manufacturer,category,image_link,featured) VALUES('$name','$desc','$price','$avail','$model','$manufacturer','$cat','$image_link','$featured')";
mysql_query($sql);
//header('Location:../addproduct.php?add=yes');

?>