<?php
require_once'connect.php';
if($_SESSION['role'] == 0){
	header('location: ../../404.php');
}else{
	// ne rien faire
}
?>