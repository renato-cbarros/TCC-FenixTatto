<?php
		$nome = $_POST['nome'];
		$valor = $_POST['valor'];
		$descricao = $_POST['desc'];
		$quant = $_POST['qtd'];
		$id = $_POST['id'];
		$tipo = 'maquina';
		
		
		$altera = "UPDATE produto SET nome_produto = '$nome', valor_produto = '$valor', descricao = '$descricao', quantidade = '$quant' WHERE id_produto = '$id'";		

			//conexão com o banco de dados
			$con=mysqli_connect($host, $user, $pass) or die ("Configuração de Banco de Dados Errada!");
			//Selecionando o banco de dados...
			mysqli_select_db($con, $db) or die ("Banco de Dados Inexistente!");
			//Inserindo os dados
			mysqli_query($conexao, $altera) or die('Error: ' . mysqli_error($conexao));
			if($altera){
				echo'<script>location.href=("../upload/gerenciador.php");alert("Produto alterado com sucesso!");</script>';
			}else{
				echo'<script>location.href=("../upload/gerenciador.php");alert("Erro ao alterar o produto!");</script>';
			}
			
