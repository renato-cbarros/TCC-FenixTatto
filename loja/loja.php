<?php
require_once("../connect.php");
	$results = $connect->query("SELECT * FROM produto ORDER BY id_produto DESC");
	$results_cres = $connect->query("SELECT * FROM produto ORDER BY valor_produto, id_produto ASC");
	$results_dec = $connect->query("SELECT * FROM produto ORDER BY valor_produto, id_produto DESC");
	$results_a_z = $connect->query("SELECT * FROM produto ORDER BY nome_produto, id_produto ASC");
	$results_z_a = $connect->query("SELECT * FROM produto ORDER BY nome_produto, id_produto DESC");
?>
<!DOCTYPE html>
<html lang="pt-Br">
	<head>
		<meta charset="UTF-8">
		<title>Fenix Tattoo Market</title>	
			<link rel="stylesheet" type="text/css" href="../css/fontes.css"/>
			<link rel="stylesheet" type="text/css" href="../css/medidas_header.css" />
			<link rel="stylesheet" type="text/css" href="css/loja/desktop.css" media="all and (min-width:961px)"/>
			<link rel="stylesheet" type="text/css" href="css/loja/tablet_deitado.css" media="all and (min-width:801px) and (max-width:960px)"/>
			<link rel="stylesheet" type="text/css" href="css/loja/tablet.css" media="all and (min-width:501px) and (max-width:800px)"/>
			<link rel="stylesheet" type="text/css" href="css/loja/mobile.css" media="all and (max-width:500px)" />
			<script type="text/javascript" src="../js/jquery2.2.4.min.js"></script>
			<script type="text/javascript" src="../js/jquery-ajax.js"></script>	
			<script type="text/javascript" src="../js/main.js"></script> 
			<script type="text/javascript" src="../js/rolagem.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
	</head>
<body>
<script type="text/javascript">

</script>

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
		
<div id="exterior">
			
	<img class="propagandas" src="images/banner.jpg" />
	<!-- ################################################################################## 	PIERCING's 	-->
	<div class="interior">
	
		<div id="filtrar">
			<center>
				<a id="principal">Populares</a> <b>|</b>
				<a id="preco_crescente">Preço: Maior-Menor</a> <b>|</b>
				<a id="preco_decrescente">Preço: Meno-Maior</a> <b>|</b>
				<a id="nome_a_z">Nome: A-Z</a> <b>|</b>
				<a id="nome_z_a">Nome: Z-A</a>			
			</center>
		</div>
		
		<!--	Principal	-->
		<div id="principal">
			<?php  
				while($row = $results->fetch()){		 
					echo '					
						<div class="imagens">
							<center>	
								<a href="comprar.php?Acao=Comprar&&email='.$email.'&&id_produto='.$row['id_produto'].'">
									<img src="../loja/uploads/'.$row['id_produto'].'.jpg" /> 
								</a>
								<a href="comprar.php?Acao=Comprar&&email='.$email.'&&id_produto='.$row['id_produto'].'">
									<div class="info_produto">
										<p class="texto_imagem_nome">'.$row['nome_produto'].'</p>
										<p class="texto_imagem_preco">R$ '.$row['valor_produto'].'</p>	
									</div>
								</a>
								</center>
						</div>							
					';
				}
			?>	
		</div>
		
		
		
		
		<!--	Valor Crescente	-->
		<div id="preco_crescente">
			<?php  
				while($row = $results_cres->fetch()){		 
					echo '					
						<div class="imagens">
							<center>	
								<a href="comprar.php?Acao=Comprar&&email='.$email.'&&id_produto='.$row['id_produto'].'">
									<img src="../loja/uploads/'.$row['id_produto'].'.jpg" /> 
								</a>
								<a href="comprar.php?Acao=Comprar&&email='.$email.'&&id_produto='.$row['id_produto'].'">
									<div class="info_produto">
										<p class="texto_imagem_nome">'.$row['nome_produto'].'</p>
										<p class="texto_imagem_preco">R$ '.$row['valor_produto'].'</p>	
									</div>
								</a>
								</center>
						</div>							
					';
				}
			?>	
		</div>
		
		
		
		
		<!--	Valor decrescente	-->
		<div id="preco_decrescente">
			<?php  
				while($row = $results_dec->fetch()){		 
					echo '					
						<div class="imagens">
							<center>	
								<a href="comprar.php?Acao=Comprar&&email='.$email.'&&id_produto='.$row['id_produto'].'">
									<img src="../loja/uploads/'.$row['id_produto'].'.jpg" /> 
								</a>
								<a href="comprar.php?Acao=Comprar&&email='.$email.'&&id_produto='.$row['id_produto'].'">
									<div class="info_produto">
										<p class="texto_imagem_nome">'.$row['nome_produto'].'</p>
										<p class="texto_imagem_preco">R$ '.$row['valor_produto'].'</p>	
									</div>
								</a>
								</center>
						</div>							
					';
				}
			?>	
		</div>
		
		
		
		
		<!--	Nome de A à Z	-->
		<div id="nome_a_z">
			<?php  
				while($row = $results_a_z->fetch()){		 
					echo '					
						<div class="imagens">
							<center>	
								<a href="comprar.php?Acao=Comprar&&email='.$email.'&&id_produto='.$row['id_produto'].'">
									<img src="../loja/uploads/'.$row['id_produto'].'.jpg" /> 
								</a>
								<a href="comprar.php?Acao=Comprar&&email='.$email.'&&id_produto='.$row['id_produto'].'">
									<div class="info_produto">
										<p class="texto_imagem_nome">'.$row['nome_produto'].'</p>
										<p class="texto_imagem_preco">R$ '.$row['valor_produto'].'</p>	
									</div>
								</a>
								</center>
						</div>							
					';
				}
			?>	
		</div>
		
		
		
		
		<!--	Nome de Z à A	-->
		<div id="nome_z_a">
			<?php  
				while($row = $results_z_a->fetch()){		 
					echo '					
						<div class="imagens">
							<center>	
								<a href="comprar.php?Acao=Comprar&&email='.$email.'&&id_produto='.$row['id_produto'].'">
									<img src="../loja/uploads/'.$row['id_produto'].'.jpg" /> 
								</a>
								<a href="comprar.php?Acao=Comprar&&email='.$email.'&&id_produto='.$row['id_produto'].'">
									<div class="info_produto">
										<p class="texto_imagem_nome">'.$row['nome_produto'].'</p>
										<p class="texto_imagem_preco">R$ '.$row['valor_produto'].'</p>	
									</div>
								</a>
								</center>
						</div>							
					';
				}
			?>	
		</div>
		
	
	
	</div>
</div>
</body>
</html>