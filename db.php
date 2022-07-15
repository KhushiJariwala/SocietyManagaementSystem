<?php
session_start();
$mysqli = new mysqli("localhost","root","","societymanagementsystem");
if(isset($_GET['logout']) && $_GET['logout'] && !empty($_SESSION['user_id'])){
	unset($_SESSION['user_id']);
	header("Refresh:0");
	die();
}

$base_url = "http://".$_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']); 

?>