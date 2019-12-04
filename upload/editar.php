<html lang='pt-Br'>
	<head>
		<meta charset='UTF-8'>
		<title>Fenix Tattoo</title>	
			<link rel='stylesheet' type='text/css' href='css/css-editar.css'/>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	</head>
<body>

<?php
if(isset($_GET['Acao']) && $_GET['Acao'] == 'Editar_produto'){
	$id = $_GET['id'];
	$produto = $connect->query("SELECT * FROM produto WHERE id_produto = '$id'");
	while($row = $produto->fetch()){
		$nome = $row['nome_produto'];
		$valor = $row['valor_produto'];
		$descricao = $row['descricao'];
		$qtd = $row['quantidade'];
	}	
	
	echo"		
		<form method='post' action='' id='altera_produto' name='altera_produto'>
			<img class='img-editar' src='../loja/uploads/$id.jpg'/><br>
				<legend-editar>Editar Produto</legend-editar>
				
					<p class='informacoes-editar'>ID do Produto (não alterar)</p>
					<input type='text' required id='id' name='id' class='input-editar' value='$id' readonly='true' />
				
					<p class='informacoes-editar'>Nome do Produto</p>
					<input type='text' required class='input-editar' value='$nome' placeholder='Ex: Máquina Preta' id='nome' name='nome' maxlength='30'/>
									
					<p class='informacoes-editar'>Descrição</p>
					<input type='text' required class='input-editar' value='$descricao' placeholder='Ex: Máquina especial para tatuar em partes mais sensíveis do corpo...' id='desc-editar' name='desc' maxlength='255'/> 
					
					<p class='informacoes-editar'>Valor</p>
					<input type='text' required class='input-editar' value='$valor' onKeyPress='if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;' placeholder='Ex: 250(só números)' id='valor-editar' name='valor'/> 
							
					<p class='informacoes-editar'>Quantidade</p>
					<input type='text' required class='input-editar' value='$qtd' onKeyPress='if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;' placeholder='Quantidade em estoque' id='quantidade-editar' name='qtd'/> 
					<br>
					<input type='submit' class='input-editar acao' name='editar_produto' value='Salvar'>
					<br>
					<a href='gerenciador.php' class='input-editar voltar'>Voltar</a>
			</form>
	
	
	
	";
}else if(isset($_GET['Acao']) && $_GET['Acao'] == 'Editar_foto'){
	$id = $_GET['id'];
	$nome = $_GET['nome'];
	
	$arquivo = $connect->query("SELECT * FROM arquivo WHERE nome_arquivo = '$nome'");
	while($row = $arquivo->fetch()){
		$nome = $row['nome_arquivo'];
		$profissional = $row['profissional'];
	}	
	echo"
		<form method='post' action='' id='altera_produto' name='altera_produto'>
			<img class='img-editar' src='../upload/uploads/$nome'/><br>
			<legend-editar>Editar Imagem da Galeria</legend-editar>
				<p class='informacoes-editar'>ID do Produto (não alterar)</p>
				<input type='text' id='id' name='id' class='input-editar' value='$id' readonly='true' />
								
				<p class='informacoes-editar'>Selecione o profissional que realizou este trabalho</p>
				<select class='botao-select' name='profissional'>
					<option value='Marivaldo'>Marivaldo</option>
					<option value='Washington'>Washington</option>
					<option value='Alex'>Alex</option>
				</select>
				<br>
				<input type='submit' class='input-editar acao' name='editar_arquivo' value='Editar Foto' />
				<br>
				<a href='gerenciador.php' class='input-editar voltar'>Voltar</a>
		</form>
	";
}
?>

</body>
</html>