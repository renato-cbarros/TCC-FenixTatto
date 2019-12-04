<?php
	require_once("../connect.php");
	$galeria = $connect->query("SELECT * FROM arquivo ORDER BY id_arquivo DESC");
	$loja = $connect->query("SELECT * FROM produto ORDER BY id_produto DESC");
?>

<?php
	session_start();
		if(!isset($_SESSION["email_profissional"]) || !isset($_SESSION["senha_profissional"])){
			header("Location:login.php");
			exit;
		}else {
			
		
?>

<!DOCTYPE html>
<html lang="pt-Br">
	<head>
		<meta charset="UTF-8">
		<title>Fenix Tattoo</title>	
			<link rel="stylesheet" type="text/css" href="../css/fontes.css"/>
			<link rel="stylesheet" type="text/css" href="css/gerenciador/desktop.css" media="all and (min-width:961px)"/>		
			<link rel="stylesheet" type="text/css" href="css/gerenciador/tablet_deitado.css" media="all and (min-width:801px) and (max-width:960px)"/>
			<link rel="stylesheet" type="text/css" href="css/gerenciador/tablet.css" media="all and (min-width:481px) and (max-width:800px)"/>
			<link rel="stylesheet" type="text/css" href="css/gerenciador/mobile.css" media="all and (max-width:480px)" />
			<link rel="stylesheet" type="text/css" href="css/lightbox.css"/>
			<script type="text/javascript" src="../js/jquery-ajax.js"></script>	
			<script type="text/javascript" src="../js/jquery2.2.4.min.js"></script>
			<script type="text/javascript" src="../js/rolagem.js"></script>
			<script type="text/javascript" src="../js/main.js"></script> 
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
	</head>
<body>	


<img id="background" src="../images/background2.jpg">

<header id="header_mobile">	
	<nav>
		<div href="#" class="hamburger">
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
		</div>
		<p id="titulo">Fenix Tattoo</p>
		<ul class="menu">							
			<a class="hamburger" href="#uploads">	Uploads		</a>
			<a class="hamburger" href="#galeria">	Galeria		</a>
			<a class="hamburger" href="#loja">		Loja Virtual</a>
		</ul>
	</nav>
</header>

<header id="header_desktop">	
	<nav>
		<p id="titulo">Fenix Tattoo</p>
		<ul class="menu">							
			<a href="#uploads"> <li>	Uploads		 </li></a>
			<a href="#galeria">	<li>	Galeria		</li></a>
			<a href="#loja">	<li>	Loja Virtual</li></a>
			<a href="logout.php">	<li>	Sair</li></a>
		</ul>
	</nav>
</header>

<div id="exterior">

		<?php
			require ('editar.php');
		?>
	<center> 
		<?php 			
			require ('confirma.php'); 
			require ('upload.php');
			require ('deleta.php');
		?>
	</center>
	
	<section id="uploads">
	
		<div id="upload_galeria">
			<form action="" method="POST" enctype="multipart/form-data">
			<legend>Galeria</legend>
			
				<input type="file" name="img[]" multiple />
				
				<p class="informacoes">Profissional</p>
				<select class="botao-texto-tipo" name="profissional">
					<option value="Marivaldo">Marivaldo</option>
					<option value="Washington">Washington</option>
					<option value="Alex">Alex</option>
				</select>
				
				<input type="submit" class='acao' name="upload" value="Enviar Fotos" />									
			</form>	
		</div>
		
		
		<div id="upload_loja">
			<form action="" method="POST" enctype="multipart/form-data">
			<legend>Loja Virtual</legend>
				<input type="file" name="img[]" />
				
				<p class="informacoes">Nome do Produto</p>
				<input type="text" placeholder="Ex: Máquina Preta" id="nome" name="nome" maxlength="30"/>
								
				<p class="informacoes">Descrição</p>
				<input type="text" placeholder="Ex: Máquina especial para tatuar em partes mais sensíveis do corpo..." id="desc" name="desc" maxlength="255"/> 
				
				<p class="informacoes">Valor</p>
				<input type="text" onKeyPress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" placeholder="Ex: 250(só números)" id="valor" name="valor"/> 
						
				<p class="informacoes">Quantidade</p>
				<input type="text" onKeyPress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" placeholder="Quantidade de produtos no estoque" id="quantidade" name="quantidade"/> 
				
				<input type="submit" class='acao' name="upload_loja" value="Vender Produto" />			
			</form>
		</div>
		
	</section>
	
	
	<section id="galeria">
		<legend>Fotos da Galeria</legend>
		<div class="imagens">
		<center>
			<?php	
				while($row = $galeria->fetch()){
					echo'
						<button class="imagem" >
							<img src="../upload/uploads/'.$row['nome_arquivo'].'" />
						</button>						
						<a class="funcao editar" href="?id='.$row['id_arquivo'].'&&nome='.$row['nome_arquivo'].'&&Acao=Editar_foto">Editar</a>
						<a class="funcao debug" href="?id='.$row['id_arquivo'].'&&nome='.$row['nome_arquivo'].'&&Acao=Debugar_Galeria">Debug</a>
						<a class="funcao excluir" href="?id='.$row['id_arquivo'].'&&nome='.$row['nome_arquivo'].'&&Acao=Deletar">Apagar</a>	
						
						<div class="info">
							<p class="nome_produto">Profissional '.$row['profissional'].'</p>
							<p class="id_produto">ID do Arquivo: '.$row['id_arquivo'].'</p>
						</div>	
					';
				}
			?>	
		</center>
		</div>	
	</section>
	
	<!--	Loja Virtual	-->
	<section id="loja">		
		<legend>Produtos da Loja Virtual</legend>

		<div class="imagens">
			<center>
			<?php	
				while($row = $loja->fetch()){
					echo'
						<button class="imagem" >
							<img src="../loja/uploads/'.$row['id_produto'].'.jpg" />					
						</button>	
						<a class="funcao editar" href="?id='.$row['id_produto'].'&&Acao=Editar_produto">Editar</a>
						<a class="funcao debug" href="?id='.$row['id_produto'].'&&nome='.$row['nome_produto'].'&&Acao=Confirma_debug">Debug</a>
						<a class="funcao excluir" href="?id='.$row['id_produto'].'&&nome='.$row['nome_produto'].'&&Acao=Confirma">Retirar</a>
						
						 
						<div class="info">
							<p class="nome_produto">'.$row['nome_produto'].'</p>
							<p class="valor_produto">Valor R$'.$row['valor_produto'].'</p>
							<p class="desc_produto">Descrição: '.$row['descricao'].'</p>
							<p class="id_produto">ID: '.$row['id_produto'].'</p>
						</div>								
					';
				}
			?>
			</center>
		</div>
	</section>
	
	
	
	
</div>

<?php
	}
	
?>

</body>
</html>