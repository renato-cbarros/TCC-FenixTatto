<?php
	require_once("../connect.php");
?>

<?php
	session_start();
	if(!isset($_SESSION["email"]) || (!isset($_SESSION["senha"]))){
		header("Location: login.html");
		exit;
	}else{
		echo "Bem vindo $nome, Seu ID de Cliente é $id";
	}
?>
	
<?php
include('busca_cep.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['novoemail'];
$senha = $_POST['novasenha'];
$numero = $_POST['novonumero'];
$complemento = $_POST['novocomplemento'];
$cep = $_POST['novocep'];
$falha = 'null';
$resultado_busca = busca_cep($cep);   
switch($resultado_busca['resultado']){  
    case '2':  
 
    $cidade = $resultado_busca['cidade']; 
    $estado = $resultado_busca['uf'];
   
    break;  
      
    case '1':  
    $rua = $resultado_busca['logradouro']; 
    $bairro = $resultado_busca['bairro']; 
    $cidade = $resultado_busca['cidade']; 
    $estado = $resultado_busca['uf']; 
    break;  
      
    default:  
        $falha = "Falha ao buscar cep: ".$resultado_busca['resultado']; 
		echo "<script language='javascript' type='text/javascript'>alert('CEP INVÁLIDO');window.location.href='login.php';</script>";
    break;  
}  

if($falha == 'null'){
	echo $rua;
	echo $bairro;
	echo $cidade;
	echo $estado;
}else{
	echo $falha;
}
?>
<?php

$altera_dados = "UPDATE cliente SET senha = '$senha', email = '$email' WHERE id_cliente = '$id'";
$altera_endereco = "UPDATE endereco_cliente SET rua = '$rua', bairro = '$bairro', numero = '$numero', complemento = '$complemento', cep = '$cep', estado = '$estado', cidade = '$cidade' WHERE id_cliente = '$id'";
//conexão com o banco de dados
	$con = mysqli_connect($host, $user, $pass) or die ("Configuração de Banco de Dados Errada!");
	
//Selecionando o banco de dados...
	mysqli_select_db($con, $db) or die ("Banco de Dados Inexistente!");
	
//Inserindo os dados
	mysqli_query($con, $altera_dados) or die ("<font style=Arial color=red><h1>Erro ao atualizar os dados</h1></font>");
	mysqli_query($con, $altera_endereco) or die ("<font style=Arial color=red><h1>Erro ao atualizar o endereço</h1></font>");
	header("location: logout.php");
?>
</body>
</html>
