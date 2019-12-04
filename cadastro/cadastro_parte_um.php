<?php
	require_once("../connect.php");
?>

<?php	
	$cadastro_email = $_POST['cadastro_email'];
	$id_sessao = $_POST['id_sessao'];
	// Inclui o arquivo com a função valida_cpf
	include('valida_cpf.php');
	$cpf = $_POST['cadastro_cpf'];

	// Se o CPF for válido
	if (validaCPF($cpf)) {
		
		//Arquivos para conexão
		$conexao = mysqli_connect($host, $user, $pass) or die (mysqli_error());
		mysqli_select_db($conexao, $db) or die (mysqli_error());
		
		$sql = "SELECT * FROM cliente WHERE email = '$cadastro_email'";
		$sqlselectemail = mysqli_query ($conexao, $sql) or die ("<font style=Arial color=red>Erro</font>");
			$row_email = mysqli_num_rows($sqlselectemail);

		$sql = "SELECT * FROM cliente WHERE cpf = '$cpf'";
		$sqlselectcpf = mysqli_query ($conexao, $sql) or die ("<font style=Arial color=red>Erro</font>");
			$row_cpf = mysqli_num_rows($sqlselectcpf);
			
		//Para ver se o email está em branco
		if($cadastro_email == "" || $cadastro_email == null){
			echo"<script type='text/javascript'>alert('Por favor, informe um E-mail!');window.location.href='../cadastro/entrar.php';</script>";
			
		//Para ver se a CPF está em branco
		}else if($cpf == "" || $cpf == null){
			echo"<script type='text/javascript'>alert('Por favor, informe um CPF!');window.location.href='../cadastro/entrar.php';</script>";
		
		}else{		
			//Para ver se o email já existe
			if($row_email != 0){
				echo"<script type='text/javascript'>alert('Erro, este email já está cadastrado!');window.location.href='../cadastro/entrar.php';</script>";				
			//Para ver se o CPF já existe
			}else if($row_cpf != 0){
				echo"<script type='text/javascript'>alert('Erro, este CPF já está cadastrado!');window.location.href='../cadastro/entrar.php';</script>";
			}else{
				header("Location:cadastrar.php?cadastro_email=$cadastro_email&&cpf=$cpf&&i=$id_sessao");
			}
		}
	}else{
		echo"<script type='text/javascript'>alert('Erro, o CPF informado é inválido!');window.location.href='../cadastro/entrar.php';</script>";
	}

		
?>






















