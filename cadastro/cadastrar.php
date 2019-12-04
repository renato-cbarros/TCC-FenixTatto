<!DOCTYPE html>
<html lang="pt-Br">
	<head>
		<meta charset="UTF-8">
		<title>Fenix Tattoo</title>	
			<link rel="stylesheet" type="text/css" href="../css/medidas_header.css"/>
			<link rel="stylesheet" type="text/css" href="css/cadastrar/desktop.css" media="all and (min-width:801px)"/>
			<link rel="stylesheet" type="text/css" href="css/cadastrar/mobile.css" media="all and (max-width:800px)"/>
			<link rel="stylesheet" type="text/css" href="../css/fontes.css" />
			<script type="text/javascript" src="../js/jquery-ajax.js"></script>	
			<script type="text/javascript" src="../js/jquery2.2.4.min.js"></script>	
			<script type='text/javascript' src="js/entrar/mostrar_senha.js"> </script>
			<script type='text/javascript' src="js/cep.js"> </script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
	</head>
<body>


<?php
$cadastro_email = $_GET['cadastro_email'];
$cpf = $_GET['cpf'];
$id_sessao = $_GET['i'];
	
	if($id_sessao == null || $id_sessao == "" || $cpf == null || $cpf == "" || $cadastro_email == null || $cadastro_email == ""){
		header("Location:entrar.php");
		exit;
	}else{
		
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
	<img src="../images/seta.png"/> <a href="../loja/loja.php?email="> Loja </a>
</div>	

<div id="legenda">
	<div id="laranja"></div>	<p class="legendas"><b class="laranja">Laranja</b><a class="laranja"> = Campos obrigatórios	</a></p>
	<div id="azul"></div>		<p class="legendas"><b class="azul">Azul</b><a class="azul"> = Campos preenchidos automáticamente (conferir se estão certos)	</a></p>	
	<div id="verde"></div>		<p class="legendas"><b class="verde">Verde</b><a class="verde"> = Campos Opcionais	</a></p>
</div>
<div id="cadastrar_parte_dois">
	<legend>Dados Pessoais</legend>
	<form action="cadastro_parte_dois.php" method="post">
		<p class="informacoes">Primeiro Nome</p>
		<input type="text" placeholder="Apenas o primeiro nome" class="input" id="nome" name="nome" maxlength="55" required autofocus/>

		<p class="informacoes">Último Nome</p>
		<input type="text" placeholder="Apenas o último nome" class="input" id="sobrenome" name="sobrenome" maxlength="55" required/>
		
		<p class="informacoes" id="informacao_cpf">CPF</p>
		<input type="text" placeholder="Apenas números." class="input" readonly="true" value="<?php echo $cpf; ?>" id="cpf" name="cpf" maxlength="11" required/>										
						
		<p class="informacoes" id="informacao_sexo">Sexo</p>
		<input type="radio" id="input_sexo_m"class="input_sexo" name="sexo" value='M' checked/><label id="sexo_m">Masculino</label>
		<input type="radio" class="input_sexo" name="sexo" value='F'/><label id="sexo_f">Feminino</label>
		
		<p class="informacoes">E-mail</p>
		<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Ex: meuemail@email.com" class="input" value="<?php echo $cadastro_email; ?>" id="email" name="email" maxlength="90" required/>
		
		<p class="informacoes">Telefone Fixo</p>
		<input type="text" placeholder="Ex: 11" class="input" id="ddd" name="ddd_telefone" onKeyPress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" minlenght="2" maxlength="2" required/>
		<input type="text" placeholder="Ex: 12345678" class="input" id="telefone" name="telefone" onKeyPress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" maxlength="8" required/>
		
		<p class="informacoes">Celular</p>
		<input type="text" placeholder="Ex: 11" class="input" id="ddd" name="ddd_celular" onKeyPress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" minlenght="2" maxlength="2" required/>
		<input type="text" placeholder="Ex: 912345678" class="input" id="celular" name="celular" onKeyPress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" maxlength="9" required/>
		
		<br/><br/>
		<div class="line"></div>
	<legend>Endereço</legend>				
		<p class="informacoes">CEP</p>
		<input type="text" placeholder="Informe o CEP e aguarde" class="input" id="cep" onKeyPress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" name="cep" maxlength="8" required/>

		<p class="informacoes">Rua</p>
		<input type="text" placeholder="Ex: Rua Cristóvão de Lã Cruz" class="input" id="rua" name="rua" maxlength="100" required/>
		
		<p class="informacoes" id="informacao_numero">Número</p>
		<input type="text" placeholder="Número de sua residência" class="input" id="numero" onKeyPress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" name="numero" maxlength="11" required/>		
		
		<p class="informacoes">Bairro</p>
		<input type="text" placeholder="Ex: Morumbi" class="input" id="bairro" name="bairro" maxlength="100" required/>
		
		<p class="informacoes">Complemento</p>
		<input type="text" placeholder="Ex: Casa" class="input" id="complemento" name="complemento" maxlength="100"/>
		
		<p class="informacoes">Cidade</p>
		<input type="text" placeholder="Ex: São Paulo" class="input"  id="cidade" name="cidade" maxlength="100" required/>
		
		<p class="informacoes" id="informacao_estado">Estado</p>
		<input type="text" placeholder="Ex: SP" class="input" id="estado" name="estado" maxlength="2" required/>
		
		<br/><br/>
		<div class="line"></div>
	<legend>Senha</legend>				
		<p class="informacoes">Senha</p>
		<input type="password" class="input" id="senha" name="senha" maxlength="50" required/>
		<div id="mostra_senha" onclick="mostraSenha()">  Mostrar senha</div>
		<div id="esconde_senha" onclick="escondeSenha()">Ocultar senha</div>
		
		<p class="informacoes" id="informacao_confirma_senha">Confirmar Senha</p>
		<input type="password" class="input" id="confirmar_senha" name="confirmar_senha" maxlength="50" required/>	
		<div id="mostra_confirma_senha" onclick="mostraConfirmaSenha()">  Mostrar senha</div>
		<div id="esconde_confirma_senha" onclick="escondeConfirmaSenha()">Ocultar senha</div>
		
		<input type="submit" class="acao input" value="Cadastrar" />								
	</form>
</div>		

<?php 
	}
?>	
</body>
</html>