<?php
require_once("../connect.php");

?>
<?php
session_start();
	if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
		echo "<script>alert(<center>Faça login para acessar o site <br> <a href='../loja/entrar.php'</a></center>)</script>";			
	}else {
		$total = $_GET['vt'];
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
	}
?>

<!DOCTYPE html>
<html lang="pt-Br">
	<head>
		<meta charset="UTF-8">
		<title>Compra</title>	
			<link rel="stylesheet" type="text/css" href="../css/fontes.css"/>
			<link rel="stylesheet" type="text/css" href="css/compra/compra.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">			
	</head>
<body>

<?php
	echo
	"
	<form id='formulario' action='../boleto/boleto.php' method='post'>
			<label>Nome</label>			<input type='text' readonly='true' class='input' value='$nome' name='nome' />
			<label>CPF</label>			<input type='text' readonly='true' class='input' value='$cpf' name='cpf' />
			<label>Email</label>			<input type='text' readonly='true' class='input' value='$email' name='email' />
			<label>Sexo</label>			<input type='text' readonly='true' class='input' value='$sexo' name='sexo' />
			<label>CEP</label>			<input type='text' readonly='true' class='input' value='$cep' name='cep' />
			<label>Rua</label>			<input type='text' readonly='true' class='input' value='$rua' name='rua' />
			<label>Numero</label>		<input type='text' readonly='true' class='input' value='$numero' name='numero' />
			<label>Bairro</label>		<input type='text' readonly='true' class='input' value='$bairro' name='bairro' />
			<label>Estado</label>		<input type='text' readonly='true' class='input' value='$estado' name='estado' />
			<label>Cidade</label>		<input type='text' readonly='true' class='input' value='$cidade' name='cidade' />
			<label>Complemento</label>	<input type='text' readonly='true' class='input' value='$complemento' name='complemento' />
			<label>Total</label>		<input type='text' readonly='true' class='input' value='$total' name='total' />
			
			<input type='submit' id='gerar_boleto' value='Gerar Boleto'>
			
			<a id='alterar-dados' href='../cadastro/painel.php?email=$email'>Corrigir Dados</a>
	</form>	
	";
?>

</body>
</html>
