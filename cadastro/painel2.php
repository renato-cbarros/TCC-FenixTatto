<?php
require_once("../connect.php");
$email = $_GET['email'];

$sqldados = $connect->query("SELECT * FROM cliente WHERE email = '$email'");
	while($row = $sqldados->fetch()){
		$id = $row['id_cliente'];
		$senha = $row['senha'];
		$cpf = $row['cpf'];
		$sexo = $row['sexo'];
		$nome = $row['nome'];
	}
	
$sqllocal = $connect->query("SELECT * FROM endereco_cliente WHERE id_cliente = '$id'");
	while($rowl = $sqllocal->fetch()){
		$id_endereco_clien = $rowl['id_endereco_clien'];
		$rua = $rowl['rua'];
		$bairro = $rowl['bairro'];
		$numero = $rowl['numero'];
		$complemento = $rowl['complemento'];		
		$cep = $rowl['cep'];
		$estado = $rowl['estado'];
		$cidade = $rowl['cidade'];
	}
?>
<?php
	session_start();
	if(!isset($_SESSION["email"]) || (!isset($_SESSION["senha"]))){
		header("Location: ../loja/entrar.php");
		exit;
	}else{
		if ($sexo == 'M'){
			echo "Bem vindo Senho $nome";
		}else if ($sexo == 'F'){
			echo "Bem vinda Senhora $nome";
		}
	}
?>
<!DOCTYPE html>
<html lang="pt-Br">
	<head>
		<meta charset="UTF-8">
		<title>Painel</title>	
			<link rel="stylesheet" type="text/css" href="css/painel/desktop.css"/>		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
	</head>
<body>
<?php
echo"
<div id='opcoes'>
	<a class='opcoes' href='logout.php'>Logout</a>
	<a class='opcoes' href='../index.php'>Site</a>
	<a class='opcoes' href='../loja/loja.php?email=$email'>Loja Virtual</a>
</div>
<center>	
	<p id='mensagem'>Atualize seus dados</p>

	<div id='dados'>
		<legend> Dados Pessoais</legend>
		<form method='post'  name='dados' action='atualiza.php'>						

			<p class='texto-cadastro' >
				<label class='texto-cadastro' for='id'>ID</label>
				<input type='text' readonly='true' class='botao-texto' value='$id' maxlength='11'>
			</p>
			
			<p class='texto-cadastro' >
				<label class='texto-cadastro' for='nome'>Nome</label>
				<input type='text' readonly='true' class='botao-texto' value='$nome' name='nome' maxlength='90'>
			</p>
			
			<p class='texto-cadastro' >
				<label class='texto-cadastro' for='novasenha'>Senha</label>
				<input type='password' class='botao-texto' value='$senha' name='novasenha' maxlength='50'>
			</p>
			
			<p class='texto-cadastro' >
				<label class='texto-cadastro' for='novoemail'>Email</label>
				<input type='email' class='botao-texto' value='$email' onfocus='this.value = '';' onblur='if (this.value == '') (this.value = '$email';)'  name='novoemail' maxlength='90'/>
			</p>	
			
			<p class='texto-cadastro' >
				<label class='texto-cadastro' for='novocep'>CEP</label>
				<input type='text' class='botao-texto' value='$cep' onfocus='this.value = '';' onblur='if (this.value == '') (this.value = '$cep';)'  name='novocep' maxlength='11'/>
			</p>
			
			<p class='texto-cadastro' >
				<label class='texto-cadastro' for='novonumero'>Nº</label>
				<input type='number' class='botao-texto' value='$numero' onfocus='this.value = '';' onblur='if (this.value == '') (this.value = '$numero';)'  name='novonumero' maxlength='11'/>
			</p>	
			
			<p class='texto-cadastro' >
				<label class='texto-cadastro' for='novocomplemento'>Complemento</label>
				<input type='text' class='botao-texto' value='$complemento' onfocus='this.value = '';' onblur='if (this.value == '') (this.value = '$complemento';)'  name='novocomplemento' maxlength='11'/>
			</p>	
			<input type='submit' class='botao-acao' id='botao-entrar' value='Atualizar'>
		</form>
	</div>	
</center>			

";
?>

</body>
</html>