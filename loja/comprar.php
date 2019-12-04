<?php
	require_once("../connect.php");
?>
<!-- Para pegar os dados do produto-->
<?php
	if(isset($_GET['Acao']) && $_GET['Acao'] == 'Comprar'){
		$id_produto = $_GET['id_produto'];
			if(is_numeric($id_produto)){
				
			}else{
				header("Location:loja.php");
			}
		settype($id_produto,"int");
		$produto = $connect->query("SELECT * FROM produto WHERE id_produto = '$id_produto'");
		while($row = $produto->fetch()){
			$nome = $row['nome_produto'];
			$valor = $row['valor_produto'];
			$desc = $row['descricao'];
			$tipo = $row['tipo'];
		}
		$outras = $connect->query("SELECT * FROM produto WHERE tipo = '$tipo' ORDER BY rand() LIMIT 4");
?>
<!DOCTYPE html>
<html lang="pt-Br">
	<head>
		<meta charset="UTF-8">
		<title>Fenix Tattoo Market</title>	
			<link rel="stylesheet" type="text/css" href="../css/fontes.css" />
			<link rel="stylesheet" type="text/css" href="../css/medidas_header.css" />
			<link rel="stylesheet" type="text/css" href="css/comprar/desktop.css" media="all and (min-width:961px)"/>
			<link rel="stylesheet" type="text/css" href="css/comprar/tablet_deitado.css" media="all and (min-width:801px) and (max-width:960px)"/>
			<link rel="stylesheet" type="text/css" href="css/comprar/tablet.css" media="all and (min-width:481px) and (max-width:800px)"/>
			<link rel="stylesheet" type="text/css" href="css/comprar/mobile.css" media="all and (max-width:481px)"/>
			<script type="text/javascript" src="../js/jquery2.2.4.min.js"></script>
			<script type="text/javascript" src="../js/jquery-ajax.js"></script>	
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
	</head>
<body>	
			<!-- Se o usuário estiver logado -->
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
						<img src='images/carrinho-icone.png'/> 
					</a>
				</div>
			</header>
			
		";
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
						<img src='images/carrinho-icone.png'/> 
					</a>			
				</div>						
			</header>
		";
	}
?>			
			
<div id="retornar">
	<img src="../images/seta.png"/> <a href="loja.php?email=<?php echo $email;?>"> Loja </a>
</div>	
			<!-- Nome do produto-->
	<?php
		echo"
			<div id='nome_produto'>
				<p>$nome</p>
			</div>
		";
	?>
		
		<!-- Imagem do produto	-->
<?php
	echo"
		<div id='produto'>		
			<img id='imagem' src='../loja/uploads/$id_produto.jpg' data-big='../loja/uploads/$id_produto.jpg' data-big2x='../loja/uploads/$id_produto.jpg' />
		</div>
	";
?>

		<!-- Informações do produto	-->
<?php
	echo"
		<div id='info_produto'>
			<p id='info_nome'>$nome</p>
			<p id='info_valor'>R$ $valor,00</p>			
			<p id='info_frete'>Frete Grátis via PAC</p>
			<a class='botao-acao' id='botao-comprar' href='carrinho.php?acao=add&&nome=$nome&&email=$email&&id=$id_produto'>Comprar</a>
			<p id='info_desc'>$desc</p>
		</div>
	";
?>		


		<!--	RODAPÉ	-->
<?php
	echo"
		<div id='comprar'>	
		<div id='opcoes'>
		<p id='texto_sugerimos'>Sugerimos também</p>
		<center>
	";
		while($row = $outras->fetch()){
			echo'
				<div class="opcoes">
					<a href="comprar.php?Acao=Comprar&&email='.$email.'&&id_produto='.$row['id_produto'].'">
						<img src="../loja/uploads/'.$row['id_produto'].'.jpg" />
					</a>	

					<p class="texto_imagem_nome">'.$row['nome_produto'].'</p>
					<p class="texto_imagem_preco">R$ '.$row['valor_produto'].'</p>										
				</div>
			';
		}
	echo"
		</center>
		</div>	
	";
?>

		<!-- 	Finaliza a ação comprar	-->
<?php		
}else{	//Se Acao = Comprar for realizada com sucesso
header("Location:loja.php");
}		//Se Acao = Comprar der algum erro
?>
</div>
</body>
</html>