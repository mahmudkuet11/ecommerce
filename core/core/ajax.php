<?php
include 'db.php';
if(isset($_GET['name'],$_GET['q'])){
	if($_GET['name'] == 'username'){
		$username = $_GET['q'];
		$sql = "SELECT * FROM user WHERE username='$username'";
		$res = mysql_query($sql);
		while($row = mysql_fetch_array($res)){
			echo '<span style="color:red">username is already taken!!!</span>';
			die();
		}
		echo '<span style="color:green">username is valid !!!</span>';
		die();
	}
	if($_GET['name'] == 'email'){
		$email = $_GET['q'];
		$sql = "SELECT * FROM user WHERE email='$email'";
		$res = mysql_query($sql);
		while($row = mysql_fetch_array($res)){
			echo '<span style="color:red">email is already taken!!!</span>';
			die();
		}
		$at = 0;
		$at_index = 0;
		$dot = 0;
		for($i=0; $i<strlen($email); $i++){
			if($email[$i] == '@'){
				$at++;
				if(!$at_index) $at_index++;
			}
		}
		for($i=$at_index; $i<strlen($email); $i++){
			if($email[$i] == '.' && $email[$i+1] == '.'){
				$dot = 0;
				break;
			}else if($email[$i] == '.'){
				$dot++;
			}
		}
		if($at == 1 && $dot >= 1 && $email[strlen($email) - 1] != '.'){
			echo '<span style="color:green">email is valid!!!</span>';
		}else echo '<span style="color:red">email is not valid!!!</span>';
		die();
	}
}

?>