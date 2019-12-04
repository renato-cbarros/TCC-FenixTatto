<?php
require_once("../connect.php");
?>

<!DOCTYPE html>
<html lang="pt-Br">
	<head>
		<meta charset="UTF-8">
		<title>Painel</title>	
			<link rel="stylesheet" type="text/css" href="../css/medidas_header.css"/>
			<link rel="stylesheet" type="text/css" href="css/painel/desktop.css" media="all and (min-width:961px)"/>
			<link rel="stylesheet" type="text/css" href="css/painel/tablet_deitado.css" media="all and (min-width:801px) and (max-width:960px)" />
			<link rel="stylesheet" type="text/css" href="css/painel/tablet.css" media="all and (min-width:481px) and (max-width:800px)" />
			<link rel="stylesheet" type="text/css" href="css/painel/mobile.css" media="all and (max-width:480px)" />
			<script type="text/javascript" src="../js/jquery-ajax.js"></script>	
			<script type="text/javascript" src="../js/jquery2.2.4.min.js"></script>	
			<script type='text/javascript' src="js/cep.js"> </script>
			<script type='text/javascript' src="js/entrar/mostrar_senha.js"> </script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
	</head>
<body>

<?php
	session_start();
	if(!isset($_SESSION["email"]) || (!isset($_SESSION["senha"]))){
		header("Location: ../loja/entrar.php");
		exit;
	}else{
		$email = $_GET['email'];
		$cliente = $connect->query("SELECT * FROM cliente WHERE email = '$email'");
		
		while($row = $cliente->fetch()){
			$id_cliente = $row['id_cliente'];
			$cpf = $row['cpf'];
			$nome = $row['nome'];
		}
		echo "
			<header>
				<p id='logo'>Fenix Tattoo</p>
				
				<div id='entrar'>
					<a id='logado' href='../cadastro/painel.php?email=$email'>$nome </a> 
					<a id='logout' href='../cadastro/logout.php'>Logout</a> 
					<a href='carrinho.php'>
						<img src='../loja/images/carrinho-icone.png'/> 
					</a>			
				</div>						
			</header>
		";
	}
?>		

	<!--	Pegando os dados	-->
<?php
	$email = $_GET['email'];
	
	//Pegar dados do cliente
	$cliente = $connect->query("SELECT * FROM cliente WHERE email = '$email'");	
	while($row = $cliente->fetch()){
		$id_cliente = $row['id_cliente'];
		$cpf = $row['cpf'];
		$nome = $row['nome'];
		$sexo = $row['sexo'];
		$senha = $row['senha'];
		
	}
	
	//Pegar endereço do cliente
	$endereco = $connect->query("SELECT * FROM endereco_cliente WHERE id_cliente = '$id_cliente'");	
	while($row = $endereco->fetch()){
		$id_endereco_clien = $row['id_endereco_clien'];
		$cep = $row['cep'];
		$rua = $row['rua'];
		$numero = $row['numero'];
		$bairro = $row['bairro'];
		$complemento = $row['complemento'];
		$cidade = $row['cidade'];
		$estado = $row['estado'];
	}
	
	//Pegar telefone do cliente
	$telefone_cliente = $connect->query("SELECT * FROM telefone_cliente WHERE id_cliente = '$id_cliente'");	
	while($row = $telefone_cliente->fetch()){
		$id_telefone_clien = $row['id_telefone_clien'];
		$telefone = $row['telefone_residencial'];
		$celular = $row['telefone_celular'];
	}
	$ddd_telefone = substr($telefone, 0, 2);
	$ddd_celular = substr($celular, 0, 2);
	
	$telefone = substr($telefone, -8);
	$celular = substr($celular, -9);
	
	$email_antigo = $email;
	
	$nome = explode(" ",$nome);
	$sobrenome = $nome[1];
	$nome = $nome[0];
  
?>	
	
			
<div id="retornar">
	<img src="../images/seta.png"/> <a href="loja.php?email=<?php echo $email;?>"> Loja </a>
</div>	


	<!--	Dados	-->
<div id="dados" >			
	<form method="post" action="alterar_dados.php" name="altera_dados">
		<legend>Dados Pessoais</legend>
			<p class="informacoes" style="display:none;">ID</p>
			<input style="display:none;" type="text" id="id_cliente" class="input" name="id_cliente" value="<?php echo $id_cliente;?>"/>
			
			<p class="informacoes" style="display:none;">Email Antigo</p>
			<input style="display:none;" type="text" id="email_antigo" class="input" name="email_antigo" value="<?php echo $email_antigo;?>"/>
			
			<p class="informacoes">Primeiro Nome</p>
			<input type="text"  id="nome" class="input" name="nome" value="<?php echo $nome;?>" maxlength="55" required/>
			
			<p class="informacoes">Último Nome</p>
			<input type="text"  id="sobrenome" class="input" name="sobrenome" value="<?php echo $sobrenome;?>" maxlength="55" required/>			
			
			<p class="informacoes">Sexo</p>
	<?php	if ($sexo == 'M'){?>
			<input type="radio"  id="input_sexo_m" class="input_sexo" name="sexo" value='M' checked/>	<label id="sexo_m">Masculino</label>
			<input type="radio"  id="input_sexo_f" class="input_sexo" name="sexo" value='F'/>			<label id="sexo_f">Feminino</label>
	<?php	}else{?>
			<input type="radio"  id="input_sexo_m" class="input_sexo" name="sexo" value='M' />			<label id="sexo_m">Masculino</label>
			<input type="radio"  id="input_sexo_f" class="input_sexo" name="sexo" value='F'checked/>		<label id="sexo_f">Feminino</label>
	<?php	}?>
			<p class="informacoes" style="margin-top:5px;">CPF</p>
			<input type="text"  id="cpf" class="input" name="cpf" value="<?php echo $cpf;?>" maxlength="11" required/>
			
			<p class="informacoes">E-mail</p>
			<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="email" class="input" name="email" value="<?php echo $email;?>" maxlength="90" required/>
				
			<p class="informacoes">Senha</p>
			<input type="password" id="senha" class="input" name="senha" maxlength="50" required/>
			<div id="mostra_senha" onclick="mostraSenha()">  Mostrar senha</div>
			<div id="esconde_senha" onclick="escondeSenha()">Ocultar senha</div>
			
			<p class="informacoes" id="informacao_confirma_senha">Confirmar Senha</p>
			<input type="password" id="confirmar_senha" class="input" name="confirma_senha" maxlength="50" required/>
			<div id="mostra_confirma_senha" onclick="mostraConfirmaSenha()">  Mostrar senha</div>
			<div id="esconde_confirma_senha" onclick="escondeConfirmaSenha()">Ocultar senha</div>
			
			<input type="submit" class="acao input" value="Alterar dados"/>
	</form>
</div>

		<!--	Endereço	-->
<div id="dados_endereco" >			
	<form method="post" action="alterar_endereco.php" name="altera_endereco">
		<legend>Endereço</legend>
			<p class="informacoes" style="display:none;">ID</p>
			<input style="display:none;" type="text" id="id_cliente" class="input" name="id_cliente" value="<?php echo $id_cliente;?>"/>
			
			<p class="informacoes" style="display:none;">Email Antigo</p>
			<input style="display:none;" type="text" id="email_antigo" class="input" name="email_antigo" value="<?php echo $email_antigo;?>"/>
			
			<p class="informacoes">CEP</p>
			<input type="text" onKeyPress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" id="cep" class="input" name="cep" value="<?php echo $cep;?>" maxlength="8" required/>
			
			<p class="informacoes">Rua</p>
			<input type="text" id="rua" class="input" name="rua" value="<?php echo $rua;?>" maxlength="90" required/>
			
			<p class="informacoes">Numero</p>
			<input type="text" onKeyPress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" id="numero" class="input" name="numero" value="<?php echo $numero;?>"maxlength="11" required/>
			
			<p class="informacoes">Bairro</p>
			<input type="text" id="bairro" class="input" name="bairro" value="<?php echo $bairro;?>" maxlength="90" required/>
			
			<p class="informacoes">Complemento</p>
			<input type="text" id="complemento" class="input" name="complemento" value="<?php echo $complemento;?>" maxlength="90"/>
			
			<p class="informacoes">Cidade</p>
			<input type="text" id="cidade" class="input" name="cidade" value="<?php echo $cidade;?>" maxlength="90" required/>
			
			<p class="informacoes">Estado</p>
			<input type="text" id="estado" class="input" name="estado" value="<?php echo $estado;?>" maxlength="2" required/>
			
			<input type="submit" class="acao input" value="Alterar Endereço"/>
	</form>
</div>

		<!--	Telefone	-->
<div id="dados_telefone" >			
	<form method="post" action="alterar_telefone.php" name="altera_telefone">
		<legend>Telefone</legend>
			<p class="informacoes" style="display:none;">ID</p>
			<input style="display:none;" type="text" id="id_cliente" class="input" name="id_cliente" value="<?php echo $id_cliente;?>"/>
			
			<p class="informacoes" style="display:none;">Email Antigo</p>
			<input style="display:none;" type="text" id="email_antigo" class="input" name="email_antigo" value="<?php echo $email_antigo;?>"/>
			
			<p class="informacoes">Telefone Fixo</p>
			<input type="text" onKeyPress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" id="ddd" class="input" name="ddd_telefone"  value="<?php echo $ddd_telefone;?>"minlenght="2" maxlength="2" required/>
			<input type="text" onKeyPress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" id="telefone" class="input" name="telefone" value="<?php echo $telefone;?>" maxlength="8" required/>
			
			<p class="informacoes">Celular</p>
			<input type="text" onKeyPress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" id="ddd" class="input" name="ddd_celular" value="<?php echo $ddd_celular;?>" minlenght="2" maxlength="2" required/>
			<input type="text" onKeyPress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" id="celular" class="input" name="celular" value="<?php echo $celular;?>" maxlength="9" required/>
			
			<input type="submit" class="acao input" value="Alterar Telefone"/>
	</form>
</div>


</body>
</html>
<?php
?>