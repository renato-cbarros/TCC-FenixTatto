<?php
require_once("../connect.php");

$conexao = mysqli_connect($host, $user, $pass) or die (mysqli_error());
mysqli_select_db($conexao, $db) or die (mysqli_error());
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Fenix Tattoo</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
	</head>
<body style="background-color:rgba(225, 225, 225, 1);">


<?php
$email = $_POST['email'];
$email_escape = addslashes($email);

$senha = $_POST['senha'];
$senha =  md5($senha);
$senha_escape = addslashes($senha);

$sql = "SELECT * FROM cliente WHERE email = '$email_escape' and senha = '$senha_escape'";
$sql = mysqli_query ($conexao, $sql) or die('Error: ' . mysqli_error($conexao));
$row = mysqli_num_rows($sql);


$email = $_POST['email'];
$senha = $_POST['senha'];
$senha =  md5($senha);

$sql = "SELECT * FROM cliente WHERE email = '$email' and senha = '$senha'";
$sql_email = "SELECT * FROM cliente WHERE email = '$email'";

$sql_query = mysqli_query ($conexao, $sql)or die('Error: ' . mysqli_error($conexao));
$row = mysqli_num_rows($sql_query);

$sql_email_query = mysqli_query ($conexao, $sql_email)or die('Error: ' . mysqli_error($conexao));
$row_email = mysqli_num_rows($sql_email_query);

	if($row > 0){
		session_start();
		$_SESSION['email']=$_POST['email'];
		$_SESSION['senha']=$_POST['senha'];
		header("Location:../loja/carrinho.php?email=$email");
	}else if($row_email > 0){
		echo "<script type='text/javascript'>alert('Senha incorreta!');window.location.href='entrar.php'</script>";
	}else if($row_email == 0){
		echo "<script type='text/javascript'>alert('E-mail incorreto!');window.location.href='entrar.php'</script>";
	}else{
		echo "<script type='text/javascript'>alert('E-mail incorreto!');window.location.href='entrar.php'</script>";
	}
	
?>
</body>
</html>