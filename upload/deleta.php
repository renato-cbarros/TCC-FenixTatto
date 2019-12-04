<?php
if(isset($_GET['Acao']) && $_GET['Acao'] == 'Deletar'){
	$id = $_GET['id'];
	$nome = $_GET['nome'];
	
	$deleta = unlink('../upload/uploads/'.$nome.'') or die ("Arquivo não encontrado! Tente desbuga-lo.");
	if($deleta){
		$sql = "DELETE FROM arquivo WHERE id_arquivo = '$id'";
		$con=mysqli_connect($host, $user, $pass)or die ("Configuração de Banco de Dados Errada!");
		mysqli_select_db($con, $db) or die ("Banco de Dados Inexistente!");
		mysqli_query($con, $sql) or die ("Houve um erro na gravação dos dados"); 
		echo'<script>location.href=("../upload/gerenciador.php");alert("Deletado com sucesso!");</script>';
	}
	
	
}else if(isset($_GET['Acao']) && $_GET['Acao'] == 'Venda'){
	$id = $_GET['id'];
	$nome = $_GET['nome'];

	$deleta = unlink('../loja/uploads/'.$id.'.jpg') or die ("Produto não encontrado! Tente desbuga-lo.");
	if($deleta){
		$sql = "DELETE FROM produto WHERE id_produto = '$id'";
		$con=mysqli_connect($host, $user, $pass)or die ("Configuração de Banco de Dados Errada!");
		mysqli_select_db($con, $db) or die ("Banco de Dados Inexistente!");
		mysqli_query($con, $sql) or die ("Erro! Contate os desenvolvedores para maior informação."); 
		echo'<script>location.href=("../upload/gerenciador.php");alert("Produto Apagado com sucesso");</script>';
	}
	
	
}else if(isset($_GET['Acao']) && $_GET['Acao'] == 'Debugar'){
	$id = $_GET['id'];
	$nome = $_GET['nome'];
	
	$sql = "DELETE FROM produto WHERE id_produto = '$id'";
	if($sql){		
		$con=mysqli_connect($host, $user, $pass)or die ("Configuração de Banco de Dados Errada!");
		mysqli_select_db($con, $db) or die ("Banco de Dados Inexistente!");
		mysqli_query($con, $sql) or die ("Houve um erro na gravação dos dados"); 
		echo'<script>location.href=("../upload/gerenciador.php");alert("Debugado com sucesso!");</script>';
	}
	

}else if(isset($_GET['Acao']) && $_GET['Acao'] == 'Debugar_Galeria'){
	$id = $_GET['id'];
	$nome = $_GET['nome'];
	
	$sql = "DELETE FROM arquivo WHERE id_arquivo = '$id'";
	if($sql){		
		$con=mysqli_connect($host, $user, $pass)or die ("Configuração de Banco de Dados Errada!");
		mysqli_select_db($con, $db) or die ("Banco de Dados Inexistente!");
		mysqli_query($con, $sql) or die ("Houve um erro na gravação dos dados"); 
		echo'<script>location.href=("../upload/gerenciador.php");alert("Debugado com sucesso!");</script>';
	}
}
?>

