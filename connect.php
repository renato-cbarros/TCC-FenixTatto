<?php
$host = "localhost";
$user = "root";
$db = "fenix";
$pass = "1234567";

try{
	$connect = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
}catch(PDOException $e){
	die("Error ".$e->getMessage());
}

//$host = "localhost";
//$user = "root";
//$db = "fenix";
//$pass = "";

//$host = "mysql.hostinger.com.br";
//$user = "u755489537_fenix";
//$db = "u755489537_fenix";
//$pass = "fenix123";
?>