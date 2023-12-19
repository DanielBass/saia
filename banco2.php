<?php
if(!isset($_SESSION)){
	  	session_start();
	}
	$servidor="127.0.0.1";
	$user="root";
	$pass="";
	$banco="projeto";
	$conn=mysqli_connect ($servidor,$user,$pass,$banco) or die (mysqli_erro());
?>

