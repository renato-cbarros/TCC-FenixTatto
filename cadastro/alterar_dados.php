<?php
	require_once("../connect.php");
	$conexao = mysqli_connect($host, $user, $pass) or die (mysqli_error());
	mysqli_select_db($conexao, $db) or die (mysqli_error());
?>

<?php
	$email_antigo = $_POST['email_antigo'];
	$id_cliente = $_POST['id_cliente'];
	$sql = $connect->query("SELECT * FROM cliente WHERE id_cliente = '$id_cliente'");
		while($row = $sql->fetch()){
			$cpf_cliente = $row['cpf'];
		}
?>


<?php	
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$cpf = $_POST['cpf'];
	$email = $_POST['email'];
	$sexo = $_POST['sexo'];
	$senha = $_POST['senha'];
	$confirma_senha = $_POST['confirma_senha'];
?>

		<!--	PARA VER SE OS CAMPOS FORAM COMPLETADOS	-->
<?php
	if($nome == "" || $nome == null){
		echo"<script type='text/javascript'>alert('Por favor, informe seu NOME!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//Nome
	}else if($sobrenome == "" || $sobrenome == null){
		echo"<script type='text/javascript'>alert('Por favor, informe seu SOBRENOME!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//Sobrenome
	}else if($cpf == "" || $cpf == null){
		echo"<script type='text/javascript'>alert('Por favor, informe seu CPF!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//CPF
	}else if($sexo == "" || $sexo == null){
		echo"<script type='text/javascript'>alert('Por favor, selecione seu SEXO!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//Sexo
	}else if($email =="" || $email == null){
		echo"<script type='text/javascript'>alert('Por favor, informe seu E-mail!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//E-mail
	}else if($senha == "" || $senha == null ){
		echo"<script type='text/javascript'>alert('Por favor, informe uma senha');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//Senha
	}else if($confirma_senha =="" || $confirma_senha == null){
		echo"<script type='text/javascript'>alert('Por favor, confirme a senha digitada!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";		//Confirmar Senha
	}else{
		//Se todos os campos foram completados...
		include('valida_cpf.php');
		// Se o CPF for válido
		if (validaCPF($cpf)) {	
		
			$sql = "SELECT * FROM cliente WHERE email = '$email'";
			$sqlselectemail = mysqli_query ($conexao, $sql) or die ("<font style=Arial color=red>Erro</font>");
			$row_email = mysqli_num_rows($sqlselectemail);

			$sql = "SELECT * FROM cliente WHERE cpf = '$cpf'";
			$sqlselectcpf = mysqli_query ($conexao, $sql) or die ("<font style=Arial color=red>Erro</font>");
			$row_cpf = mysqli_num_rows($sqlselectcpf);
	
			//Para ver se o email já existe
			if($row_email != 0 && $email != $email_antigo){
				echo"<script type='text/javascript'>alert('Erro, este email já está cadastrado!');window.location.href='../cadastro/entrar.php?email=$email_antigo';</script>";				
			//Para ver se o CPF já existe
			}else if($row_cpf != 0 && $cpf != $cpf_cliente){
				echo"<script type='text/javascript'>alert('Erro, este CPF já está cadastrado!');window.location.href='../cadastro/entrar.php?email=$email_antigo';</script>";
			}else{
				
				//Ver se as senhas conferem
				if($senha != $confirma_senha){
					echo"<script type='text/javascript'>alert('Erro, as senhas informadas são diferentes!');window.location.href='../cadastro/entrar.php?email=$email_antigo';</script>";
				}else{	//Se tudo estiver certo...
				
					$nome = $nome." ".$sobrenome;		//Colocar o nome completo
					$senha = md5($senha);						//Criptografar a senha
					
					$altera = "UPDATE cliente SET email = '$email', cpf = '$cpf', nome = '$nome', sexo = '$sexo' WHERE id_cliente = '$id_cliente'";
					mysqli_query($conexao, $altera) or die('Error: ' . mysqli_error($conexao));
					if($altera){
						echo"<script type='text/javascript'>alert('Dados Pessoais atualizado com sucesso!');window.location.href='../cadastro/painel.php?email=$email';</script>";
					}else{
						echo"<script type='text/javascript'>alert('Erro! Tente novamente mais tarde');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";
					}
				}
			}
		}else{
			echo"<script type='text/javascript'>alert('Erro, o CPF informado é inválido!');window.location.href='../cadastro/painel.php?email=$email_antigo';</script>";
		}
	}
?>