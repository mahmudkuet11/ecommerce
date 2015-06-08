<?php
include 'db.php';
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$con_pass = $_POST['confirm_password'];
if($pass != $con_pass){
	header('Location:../register.php?error=pass');
	die();
}
$sql = "SELECT * FROM user WHERE username='$username'";
$res = mysql_query($sql);
while($row = mysql_fetch_array($res)){
	header('Location:../register.php?error=username');
	die();
}
$hash_pass = md5($pass);
$sql = "INSERT INTO user (username,password,email) VALUES('$username','$hash_pass','$email')";
mysql_query($sql);
header('Location:../login.php');

?>