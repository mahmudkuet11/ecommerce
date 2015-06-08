<?php
session_start();
$con = mysql_connect("localhost","root","");
if(!$con) {
	echo 'could not be connected';
	die();
}
$db = mysql_select_db("project",$con);
if(!$db){
	header("Location:install/install.php");
	die();
}

?>