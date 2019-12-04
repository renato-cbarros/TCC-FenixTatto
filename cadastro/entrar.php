<?php
	require_once("../connect.php");
?>

<?php
	$id_sessao = rand();
?>
<!DOCTYPE html>
<html lang="pt-Br">
	<head>
		<meta charset="UTF-8">
		<title>Fenix Tattoo</title>	
			<link rel="stylesheet" type="text/css" href="../css/medidas_header.css"/>
			<link rel="stylesheet" type="text/css" href="css/entrar/desktop.css" media="all and (min-width:961px)"/>
			<link rel="stylesheet" type="text/css" href="css/entrar/tablet_deitado.css" media="all and (min-width:701px) and (max-width:960px)"/>
			<link rel="stylesheet" type="text/css" href="css/entrar/tablet.css" media="all and (min-width:481px) and (max-width:700px)"/>
			<link rel="stylesheet" type="text/css" href="css/entrar/mobile.css" media="all and (max-width:481px)"/>
			<link rel="stylesheet" type="text/css" href="../css/fontes.css" />
			<script type="text/javascript" src="../js/jquery-ajax.js"></script>	
			<script type="text/javascript" src="../js/jquery2.2.4.min.js"></script>	
			<script type='text/javascript' src="js/entrar/mostrar_senha.js"> </script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
	</head>
<body>

<?php
	session_start();
	if(!isset($_SESSION["email"]) || (!isset($_SESSION["senha"]))){
		$email = null;
		echo "
			<header>
				<p id='logo'>Fenix Tattoo</p>
				
				<div id='entrar'>
					<a id='logout' href='../cadastro/entrar.php'>Entrar</a> 
					<a href='carrinho.php'>
						<img src='../loja/images/carrinho-icone.png'/> 
					</a>
				</div>
			</header>
			
		";		
?>		
<div id="retornar">
	<img src="../images/seta.png"/> <a href="../loja/loja.php?email=<?php echo $email;?>"> Loja </a>
</div>		
		
				<div id="login">
					<legend>Acessar minha conta</legend>
					<form action="login.php" method="post">
						<p class="informacoes">Digite seu E-MAIL</p>
						<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="email" name="email" maxlength="90"/>
							
						<p class="informacoes">Digite sua SENHA</p>
						<input type="password" id="senha" name="senha" maxlength="55"/> 
						
						<div id="esqueci_senha">Esqueceu sua senha?</div>
						<div id="mostra_senha" onclick="mostraSenha()">  Mostrar senha</div>
						<div id="esconde_senha" onclick="escondeSenha()">Ocultar senha</div>						
						<input type="submit" class='acao' value="Entrar" />								
					</form>
				</div>
				
				
				
				<div id="cadastrar">
					<legend>Quero me cadastrar</legend>
					<form action="cadastro_parte_um.php" method="post">
						<input style="display:none;" type="text" value="<?php echo $id_sessao; ?>" id="id_sessao" name="id_sessao" readonly="true"/>
					
						<p class="informacoes">Digite seu E-MAIL</p>
						<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="cadastro_email" name="cadastro_email" maxlength="90"/>

						<p class="informacoes">Informe seu CPF</p>
						<input type="text" id="cadastro_cpf" onKeyPress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" name="cadastro_cpf" maxlength="11"/>
						
						<input type="submit" class='acao' value="Cadastrar" />								
					</form>
				</div>
		
	
		
<?php		
	}else{		
		$email = $_GET['email'];
		$cliente = $connect->query("SELECT * FROM cliente WHERE email = '$email'");
		
		while($row = $cliente->fetch()){
			$id_cliente = $row['id_cliente'];
			$cpf = $row['cpf'];
			$nome = $row['nome'];
		}
		header("Location:../loja/compra.php?email=$email");
	}
?>
<body>
</html>