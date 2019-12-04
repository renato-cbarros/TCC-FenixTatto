<html lang="pt-Br">
	<head>
		<meta charset="UTF-8">
		<title>Fenix Tattoo</title>	
			<link rel="stylesheet" type="text/css" href="css/entrar/css.css"/>
			<script type="text/javascript" src="../js/jquery-ajax.js"></script>	
			<script type="text/javascript" src="../js/jquery2.2.4.min.js"></script>	
			<script type='text/javascript' src="../cadastro/js/entrar/mostrar_senha.js"> </script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
	</head>
<body>
	<div id="login">
		<legend>Área restrita aos funcionários da empresa Fenix Tattoo</legend>
		<form action="userauthentication.php" method="post">
			<p class="informacoes">Digite seu E-MAIL</p>
			<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="email" name="email_profissional" maxlength="90"/>
								
			<p class="informacoes">Digite sua SENHA</p>
			<input type="password" id="senha" name="senha_profissional" maxlength="55"/> 
							
			<div id="esqueci_senha">Esqueceu sua senha?</div>
			<div id="mostra_senha" onclick="mostraSenha()">  Mostrar senha</div>
			<div id="esconde_senha" onclick="escondeSenha()">Ocultar senha</div>						
			<input type="submit" class='acao' value="Entrar" />								
		</form>
	</div>
</body>
</html>