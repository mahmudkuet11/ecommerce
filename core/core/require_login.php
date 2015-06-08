<?php
session_start();
if(!isset(!$_SESSION['user_id'])){
	$path = dirname(__FILE__);
	$len = strlen($path);
	$dir_name = $path[$len-4].$path[$len-3].$path[$len-2].$path[$len-1];
	if($dir_name == 'core'){
		header("Location:../login.php");
	}else{
		header("Location:/login.php");
	}
	die();
}
?>