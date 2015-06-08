<?php
session_start();
session_destroy();
setcookie("id", '', time()-60);
header('Location:index.php');
?>