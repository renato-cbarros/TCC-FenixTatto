<?php
	require_once("../connect.php");
	include('busca_cep.php');
	$conexao = mysqli_connect($host, $user, $pass) or die (mysqli_error());
	mysqli_select_db($conexao, $db) or die (mysqli_error());
?>

	<!--	Pegar os POSTS	-->
<?php
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$cpf = $_POST['cpf'];
	$sexo = $_POST['sexo'];
	$email = $_POST['email'];

	$ddd_telefone = $_POST['ddd_telefone'];
	$telefone = $_POST['telefone'];
	$ddd_celular = $_POST['ddd_celular'];
	$celular = $_POST['celular'];
	
	$cep = $_POST['cep'];
	$rua = $_POST['rua'];
	$numero = $_POST['numero'];
	$bairro = $_POST['bairro'];
	$complemento = $_POST['complemento'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	
	$senha = $_POST['senha'];
	$confirma_senha = $_POST['confirmar_senha'];
	
	if($complemento == "" || $complemento == null){
		$complemento = " ";
	}else{
		$complemento = $complemento;
	}
?>

<!--	Para verificar se o CEP é valido	-->
<?php
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
			echo "<script language='javascript' type='text/javascript'>alert('Erro, o CEP informado é inválido');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";
		break;  
	}  

	if($falha == 'null'){
		
	}else{
		
	}
?>

	<!--	PARA VER SE O E-MAIL E O CPF JÁ EXISTEM	-->
<?php
	$sql = "SELECT * FROM cliente WHERE email = '$email'";
		$sqlselectemail = mysqli_query ($conexao, $sql) or die ("<font style=Arial color=red>Erro</font>");
			$row_email = mysqli_num_rows($sqlselectemail);

		$sql = "SELECT * FROM cliente WHERE cpf = '$cpf'";
		$sqlselectcpf = mysqli_query ($conexao, $sql) or die ("<font style=Arial color=red>Erro</font>");
			$row_cpf = mysqli_num_rows($sqlselectcpf);

	if($row_email != 0){
		echo"<script type='text/javascript'>alert('Erro, este email já está cadastrado!');window.location.href='../cadastro/entrar.php';</script>";
		
	//Para ver se o CPF já existe
	}else if($row_cpf != 0){
		echo"<script type='text/javascript'>alert('Erro, este CPF já está cadastrado!');window.location.href='../cadastro/entrar.php';</script>";
	}else{
?>

		<!--	PARA VER SE OS CAMPOS FORAM COMPLETADOS	-->
	<?php
		if($nome == "" || $nome == null){
			echo"<script type='text/javascript'>alert('Por favor, informe seu NOME!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";		//Nome
		}else if($sobrenome == "" || $sobrenome == null){
			echo"<script type='text/javascript'>alert('Por favor, informe seu SOBRENOME!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";		//Sobrenome
		}else if($cpf == "" || $cpf == null){
			echo"<script type='text/javascript'>alert('Erro, por favor tente novamente. Desculpe!');window.location.href='../cadastro/entrar.php';</script>";		//CPF
		}else if($sexo == "" || $sexo == null){
			echo"<script type='text/javascript'>alert('Por favor, selecione seu SEXO!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";		//Sexo
		}else if($ddd_telefone == "" || $ddd_telefone == null){	
			echo"<script type='text/javascript'>alert('Por favor, informe um DDD para seu TELEFONE!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";		//DDD Telefone
		}else if($ddd_telefone <'10' || $ddd_telefone > '99'){
			echo"<script type='text/javascript'>alert('Por favor, informe um DDD VÁLIDO para seu TELEFONE!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";		//DDD Telefone
		}else if($telefone == "" || $telefone == null){
			echo"<script type='text/javascript'>alert('Por favor, informe seu TELEFONE!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";		//Telefone
		}else if($ddd_celular == "" || $ddd_celular == null){
			echo"<script type='text/javascript'>alert('Por favor, informe um DDD para seu CELULAR!!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";		//DDD Celular
		}else if($ddd_celular <'10' || $ddd_celular > '99'){
			echo"<script type='text/javascript'>alert('Por favor, informe um DDD VÁLIDO para seu CELULAR!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";		//DDD Celular
		}else if($celular == "" || $celular == null){
			echo"<script type='text/javascript'>alert('Por favor, informe seu CELULAR!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";		//Celular
		}else if($cep == "" || $cep == null){
			echo"<script type='text/javascript'>alert('Por favor, informe seu CEP!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";		//CEP
		}else if($rua == "" || $rua == null){
			echo"<script type='text/javascript'>alert('Por favor, informe o nome de sua RUA!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";		//Rua
		}else if($numero == "" || $numero == null){
			echo"<script type='text/javascript'>alert('Por favor, informe o NÚMERO de sua residência');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";		//Numero
		}else if($bairro == "" || $bairro == null){
			echo"<script type='text/javascript'>alert('Por favor, informe o nome de seu BAIRRO!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";		//Bairro
		}else if($cidade == "" || $cidade == null){
			echo"<script type='text/javascript'>alert('Por favor, informe sua CIDADE!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";		//Cidade
		}else if($estado == "" || $estado == null){
			echo"<script type='text/javascript'>alert('Por favor, informe os dígitos de seu ESTADO!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";		//Estado
		}else if($senha == "" || $senha == null){
			echo"<script type='text/javascript'>alert('Por favor, digite uma SENHA!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";		//Senha
		}else if($confirma_senha == "" || $confirma_senha == null){
			echo"<script type='text/javascript'>alert('Por favor, CONFIRME SUA SENHA!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";		//Confirmar senha
		}else{		// Se tudo foi preenchido...
	?>
					<!--	Inserir os dados	-->
	<?php		
			//Para verificar se as senhas são iguais
			if($senha != $confirma_senha){
				echo"<script type='text/javascript'>alert('Erro, As senhas digitadas são diferentes!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";
			}else{		//Se as senha são iguais
				
				//Começa a inserir os dados
				$nome = $nome." ".$sobrenome;		//Colocar o nome completo
				$senha = md5($senha);						//Criptografar a senha
				$telefone = $ddd_telefone." ".$telefone;		//Colocando DDD no telefone
				$celular = $ddd_celular." ".$celular;		//Colocando DDD no celular
				
				
				//Abre Cliente=============================================================================================
					$sql = "INSERT INTO cliente (id_cliente, email, cpf, sexo, nome, senha) VALUES (null, '$email', '$cpf', '$sexo', '$nome', '$senha')";
					mysqli_query($conexao, $sql) or die('Error: ' . mysqli_error($conexao));		//Inserindo os dados
							
					if($sql){	//Se salvou os DADOS do cliente...
				//Pegar o ID=============================================================================================
										$sql_id_cliente = $connect->query("SELECT * FROM cliente WHERE email = '$email' and cpf = '$cpf' and sexo = '$sexo' and nome = '$nome'");
										while($row = $sql_id_cliente->fetch()){
											$id_cliente = $row['id_cliente'];
										}								
										if($sql_id_cliente){	//Se pegou o ID do cliente...	
				//Abre Endereço=========================================================================================
															$sql = "INSERT INTO endereco_cliente (id_endereco_clien, id_cliente, rua, bairro, numero, complemento, cep, estado, cidade) VALUES (null, '$id_cliente', '$rua', '$bairro', '$numero', '$complemento', '$cep', '$estado', '$cidade')";
															mysqli_query($conexao, $sql) or die('Error: ' . mysqli_error($conexao));		//Inserindo os dados																								
															if($sql){	//Se salvou o ENDEREÇO do cliente...
				//Abre Telefone==========================================================================================
																				$sql = "INSERT INTO telefone_cliente (id_telefone_clien, id_cliente, telefone_residencial, telefone_celular) VALUES (null, '$id_cliente', '$telefone', '$celular')";
																				mysqli_query($conexao, $sql) or die('Error: ' . mysqli_error($conexao));		//Inserindo os dados																																						
																				if($sql){	//Se salvou o TELEFONE do cliente...
																				
				//Abrir sessão============================================================================================		
																										echo"<script type='text/javascript'>alert('Cadastrado com sucesso!');window.location.href='../cadastro/entrar.php';</script>";
				//Fecha sessão============================================================================================	
			
																				}else{	//Não salvou o TELEFONE do cliente...
																					echo"<script type='text/javascript'>alert('Erro ao salvar o telefone! Tente novamente mais tarde');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";
																				}	
				//Fecha Telefone==========================================================================================	
				
															}else{	//Não salvou o ENDEREÇO...
																	//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\\
																echo"<script type='text/javascript'>alert('Erro ao salvar o telefone!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";
															}															
				//Fecha Endereço==========================================================================================		
				
									}else{	//Não pegou o ID...
											//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\\
										echo"<script type='text/javascript'>alert('Erro ao salvar o endereço!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";
									}	
				//Fecha ID==========================================================================================	
				
				}else{	//Se dados do cliente não foram salvos
						//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\\
					echo"<script type='text/javascript'>alert('Erro ao inserir os dados do cliente!');window.location.href='../cadastro/cadastrar.php?cadastro_email=$email&&cpf=$cpf';</script>";
				}		
				//Fecha Cliente=============================================================================================
				
			}//Fecha as senhas iguais		

		
		}//Fecha se tudo for preenchido
	}//Fecha se o email for igual
?>	
