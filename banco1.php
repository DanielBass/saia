<?php
if(!isset($_SESSION)){
	  	session_start();
	}
	$dsn = "mysql:dbname=projeto;host=127.0.0.1";
	$dbuser="root";
	$dbpass="";
    $db = new PDO ($dsn,$dbuser,$dbpass,array (PDO:: MYSQL_ATTR_INIT_COMMAND=> "SET NAMES utf8"));
?>