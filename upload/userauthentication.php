<?php
require_once("../connect.php");

$conexao = mysqli_connect($host, $user, $pass) or die (mysqli_error());
mysqli_select_db($conexao, $db) or die (mysqli_error());
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Fenix Tatto</title>
	</head>
<body>

<?php
$email_profissional = $_POST['email_profissional'];
$senha_profissional = $_POST['senha_profissional'];

$email_escape = addslashes($email_profissional);
$senha_escape = addslashes($senha_profissional);

$sql = "SELECT * FROM funcionario WHERE email = '$email_escape' and senha = '$senha_escape'";
$sql = mysqli_query ($conexao, $sql) or die('Error: ' . mysqli_error($conexao));
$row = mysqli_num_rows($sql);

	if($row > 0){
		session_start();
		$_SESSION['email_profissional'] = $email_profissional;
		$_SESSION['senha_profissional'] = $senha_profissional;
		header("location:gerenciador.php");
	}else{
		header("location:login.php");
	}
?>
</body>
</html>

