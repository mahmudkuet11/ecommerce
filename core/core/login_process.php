<?php
include 'db.php';
$username = $_POST['username'];
$pass = md5($_POST['password']);

$sql = "SELECT user_id FROM user WHERE (username='$username' OR email='$username') AND password='$pass'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
	if($row['user_id']){
		$_SESSION['user_id'] = $row['user_id'];
		if(isset($_POST['remember']) && $_POST['remember'] == 'on'){
			setcookie("id", $_SESSION['user_id'], time()+60);
		}else{
			setcookie("id", '', time()-60);
		}
		header('Location:../index.php');
		die();
	}
}

header('Location:../login.php?login_error=yes');
?>