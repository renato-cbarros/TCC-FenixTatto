<!DOCTYPE html>
<html lang="pt-Br">
	<head>
		<meta charset="UTF-8">
		<title>Fenix Tattoo</title>	
			<link rel="stylesheet" type="text/css" href="css/css-confirma.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
<body>

<?php
if(isset($_GET['Acao']) && $_GET['Acao'] == 'Confirma'){
	$id = $_GET['id'];
	$nome = $_GET['nome'];
	

	echo'
	<center>
		<div class="confirmar">
			<h1>'.$nome.'</h1>
			<img class="img-confirma" src="../loja/uploads/'.$id.'.jpg" />
			<p class="p-confirmar" >Quer realmente retirar este produto de sua loja ?</p><br>
			<a class="a-confirmar" href="?id='.$id.'&&nome='.$nome.'&&Acao=Venda">SIM</a>
			<a class="a-confirmar" href="../upload/gerenciador.php">NÃO</a>
		</div>
	</center>
	';
}else if(isset($_GET['Acao']) && $_GET['Acao'] == 'Confirma_debug'){
	$id = $_GET['id'];
	$nome = $_GET['nome'];
	

	echo'
	<center>
		<div class="confirmar">
			<img class="img-confirma" src="../loja/uploads/'.$id.'.jpg" />
			<p class="p-confirmar" >Isto apagará o produto do banco de dados, tem certeza que deseja debuga-lo ?</p><br>
			<a class="a-confirmar" href="?id='.$id.'.jpg&&nome='.$nome.'&&Acao=Debugar">SIM</a>
			<a class="a-confirmar" href="../upload/gerenciador.php">NÃO</a>
		</div>
	</center>
	';
} 
?>
</body>
</html>