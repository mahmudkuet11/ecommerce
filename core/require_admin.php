<?php
if(!is_admin($_SESSION['user_id'])){
	$path = dirname(__FILE__);
	$len = strlen($path);
	$dir_name = $path[$len-4].$path[$len-3].$path[$len-2].$path[$len-1];
	if($dir_name == 'core'){
		header("Location:index.php");
	}else{
		header("Location:index.php");
	}
	die();
}
?>