<?php
	require_once("../connect.php");
	include('busca_cep.php');
	$conexao = mysqli_connect($host, $user, $pass) or die (mysqli_error());
	mysqli_select_db($conexao, $db) or die (mysqli_error());
?>

<?php
	$email_antigo = $_POST['email_antigo'];
	$id_cliente = $_POST['id_cliente'];
?>


<?php	
	$cep = $_POST['cep'];
	$rua = $_POST['rua'];
	$numero = $_POST['numero'];
	$bairro = $_POST['bairro'];
	$complemento = $_POST['complemento'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
?>

		<!--	PARA VER SE OS CAMPOS FORAM COMPLETADOS	-->
<?php																		
	if($cep == "" || $cep == null){
		echo"<script type='text/javascript'>alert('Por favor, informe seu CEP!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//CEP
	}else if($rua == "" || $rua == null){
		echo"<script type='text/javascript'>alert('Por favor, informe o nome de sua RUA!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//Rua
	}else if($numero == "" || $numero == null){
		echo"<script type='text/javascript'>alert('Por favor, informe o NÚMERO de sua residência');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//Numero
	}else if($bairro == "" || $bairro == null){
		echo"<script type='text/javascript'>alert('Por favor, informe o nome de seu BAIRRO!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//Bairro
	}else if($cidade == "" || $cidade == null){
		echo"<script type='text/javascript'>alert('Por favor, informe sua CIDADE!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//Cidade
	}else if($estado == "" || $estado == null){
		echo"<script type='text/javascript'>alert('Por favor, informe os dígitos de seu ESTADO!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//Estado
	}else{
		//Se todos os campos foram completados...
		//Para verificar se o CEP é valido
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
				echo "<script type='text/javascript'>alert('Erro, o CEP informado é inválido');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";
			break;  
		}  
		if($falha == 'null'){	
			// Se o CEP for válido...
				$cep = $_POST['cep'];
				$rua = $_POST['rua'];
				$numero = $_POST['numero'];
				$bairro = $_POST['bairro'];
				$complemento = $_POST['complemento'];
				$cidade = $_POST['cidade'];
				$estado = $_POST['estado'];
									
					
					$altera = "UPDATE endereco_cliente SET cep = '$cep', rua = '$rua', numero = '$numero', bairro = '$bairro', complemento = '$complemento', cidade = '$cidade', estado = '$estado' WHERE id_cliente = '$id_cliente'";
					mysqli_query($conexao, $altera) or die('Error: ' . mysqli_error($conexao));
					if($altera){
						echo"<script type='text/javascript'>alert('Endereço atualizado com sucesso!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";
					}else{
						echo"<script type='text/javascript'>alert('Erro! Tente novamente mais tarde');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";
					}
							
		}else{
			echo"<script type='text/javascript'>alert('Erro, o CPF informado é inválido!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";
		}
	}
?>