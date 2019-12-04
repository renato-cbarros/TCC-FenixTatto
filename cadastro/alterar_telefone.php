<?php
	require_once("../connect.php");
	$conexao = mysqli_connect($host, $user, $pass) or die (mysqli_error());
	mysqli_select_db($conexao, $db) or die (mysqli_error());
?>

<?php
	$email_antigo = $_POST['email_antigo'];
	$id_cliente = $_POST['id_cliente'];
?>


<?php	
	$telefone = $_POST['telefone'];
	$celular = $_POST['celular'];
	$ddd_telefone = $_POST['ddd_telefone'];
	$ddd_celular = $_POST['ddd_celular'];

?>

		<!--	PARA VER SE OS CAMPOS FORAM COMPLETADOS	-->
<?php
	if($ddd_telefone == "" || $ddd_telefone == null){	
		echo"<script type='text/javascript'>alert('Por favor, informe um DDD para seu TELEFONE!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//DDD Telefone
	}else if($ddd_telefone <'10' || $ddd_telefone > '99'){
		echo"<script type='text/javascript'>alert('Por favor, informe um DDD VÁLIDO para seu TELEFONE!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//DDD Telefone
	}else if($telefone == "" || $telefone == null ){
		echo"<script type='text/javascript'>alert('Por favor, informe seu TELEFONE!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//Telefone
	}else if($ddd_celular == "" || $ddd_celular == null){
		echo"<script type='text/javascript'>alert('Por favor, informe um DDD para seu CELULAR!!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//DDD Celular
	}else if($ddd_celular <'10' || $ddd_celular > '99'){
		echo"<script type='text/javascript'>alert('Por favor, informe um DDD VÁLIDO para seu CELULAR!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//DDD Celular
	}else if($celular == "" || $celular == null){
		echo"<script type='text/javascript'>alert('Por favor, informe seu CELULAR!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//Celular
	}else{
		//Se tudo foi completado...
		if($telefone > '100000000' ){
			echo"<script type='text/javascript'>alert('Erro! TELEFONE possui números a mais');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//Telefone
		}else if($telefone < '9999999'){
			echo"<script type='text/javascript'>alert('Erro! TELEFONE possui números a menos!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//Telefone
		}else if($celular > '1000000000' ){
			echo"<script type='text/javascript'>alert('Erro! CELULAR possui números a mais!');'window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//Celular
		}else if($celular < '9999999'){
			echo"<script type='text/javascript'>alert('Erro! CELULAR possui números a menos!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//Celular
		}else{
			//Se todos os campos foram completados...		
					
			$telefone = $ddd_telefone." ".$telefone;
			$celular = $ddd_celular." ".$celular;
					
			$altera = "UPDATE telefone_cliente SET telefone_residencial = '$telefone', telefone_celular = '$celular' WHERE id_cliente = '$id_cliente'";
			mysqli_query($conexao, $altera) or die('Error: ' . mysqli_error($conexao));
			if($altera){
				echo"<script type='text/javascript'>alert('Telefone atualizado com sucesso!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";
			}else{
				echo"<script type='text/javascript'>alert('Erro! Tente novamente mais tarde.');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";
			}
		}
	}		
	
?>