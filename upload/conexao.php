<?php
require_once("../connect.php");
// conecta ao banco de dados
$con = mysqli_pconnect($host, $user, $pass) or trigger_error(mysqli_error(),E_USER_ERROR); 
// seleciona a base de dados em que vamos trabalhar
mysqli_select_db($con, $db);
?>