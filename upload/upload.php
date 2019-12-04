<?php
	require_once("../connect.php");	
?>

<?php
if(isset($_POST['upload'])){
		
		//INFORMAÇÃO DAS IMAGEM
		$file = $_FILES['img'];
		$profissional = $_POST['profissional'];
		$numFile = count(array_filter($file['name']));
		
		//PASTA
		$folder = 'uploads/';
		
		//REQUISITOS QUE A IMAGEM DEVE OBEDESCER
		$permite = array('image/jpeg', 'image/png');
		$maxSize = 1024 * 1024 * 20;

		//MENSAGENS
		$msg = array();
		$errorMsg = array(
			1 => 'O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.',
			2 => 'O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML.',
			3 => 'O upload do arquivo foi feito parcialmente.',
			4 => 'Nenhum arquivo foi enviado.',
			);
		
		if($numFile <= 0)
			echo 'Selecione uma imagem';
		else{
			for($i = 0; $i < $numFile; $i++){
				$name = $file['name'][$i];
				$type = $file['type'][$i];
				$size = $file['size'][$i];
				$error = $file ['error'][$i];
				$tmp = $file['tmp_name'][$i];
				
				
				$extensao = @end(explode('.', $name));
				$novoNome = rand().".$extensao";
				
				if($error != 0)
					echo "<b style='font-family:arial; color:red;'>$name :</b><p style='font-family:arial; color:red;'> ".$errorMsg[$error]."</p>";
				else if(!in_array($type, $permite))
					echo "<b style='font-family:arial; color:red;'>$name :</b> <p style='font-family:arial; color:red;'> Erro! Imagem não suportada. Use apenas imagens JPG ou PNG</p>";
				else if($size > $maxSize)
					echo "<b style='font-family:arial; color:red;'>$name :</b> <p  style='font-family:arial; color:red;'>Erro! Imagem ultrapassa o limite de 20MB.</p>";
				else{
					if(move_uploaded_file($tmp, $folder.'/'.$novoNome)){
						$sql = "INSERT INTO arquivo (id_arquivo, nome_arquivo, profissional) VALUES (null, '$novoNome', '$profissional')";
						//conexão com o banco de dados
						$con = mysqli_connect($host, $user, $pass) or die ("Configuração de Banco de Dados Errada!");
						//Selecionando o banco de dados...
						mysqli_select_db($con, $db) or die ("Banco de Dados Inexistente!");
						//Inserindo os dados
						mysqli_query($con, $sql) or die ("<font style=Arial color=red><h1>Houve um erro na gravação dos dados</h1></font>");
						echo "<font style=Arial color=green><b>".$name.": Cadastro efetuado com sucesso! O arquivo foi renomeado para ".$novoNome."</b></font><br>";						
					}else{
						echo "<font style=Arial color=red font-weight=bold><b>".$name.": Falha!</b></font><br>";
					}				
				}
			}	
		}	
	}

////////////////////////////////////////////////////////////	LOJA VIRTUAL	////////////////////////////////////////////////////////////


if(isset($_POST['upload_loja'])){		
		//INFORMAÇÃO DAS IMAGEM	
		$file = $_FILES['img'];
		$nome = $_POST['nome'];
		$valor = $_POST['valor'];
		$desc = $_POST['desc'];
		$quant = $_POST['quantidade'];
		$numFile = count(array_filter($file['name']));
		$tipo = 'maquina';
		
		//PASTA
		$folder = '../loja/uploads/';
		
		//REQUISITOS QUE A IMAGEM DEVE OBEDESCER
		$permite = array('image/jpeg');
		$maxSize = 1024 * 1024 * 20;

		//MENSAGENS
		$msg = array();
		$errorMsg = array(
			1 => 'O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.',
			2 => 'O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML.',
			3 => 'O upload do arquivo foi feito parcialmente.',
			4 => 'Nenhum arquivo foi enviado.',
			);
		
		//Se o ID não for preenchido
		$id = rand();
		
		//while($id = $select){
		//	$select = "SELECT id_produto FROM produto WHERE id_produto = '$id'";
		//	$id = $id + '1';
		//}
		
		if($numFile <= 0){
			echo 'Selecione uma imagem';
		}else{
			for($i = 0; $i < $numFile; $i++){
				$name = $file['name'][$i];
				$type = $file['type'][$i];
				$size = $file['size'][$i];
				$error = $file ['error'][$i];
				$tmp = $file['tmp_name'][$i];		
									
				if($error != 0)
					echo "<b style='font-family:arial; color:red;'>$name :</b><p style='font-family:arial; color:red;'> ".$errorMsg[$error]."</p>";
				else if(!in_array($type, $permite))
					echo "<b style='font-family:arial; color:red;'>$name :</b> <p style='font-family:arial; color:red;'> Erro! Imagem não suportada. Use apenas imagens JPG</p>";
				else if($size > $maxSize)
					echo "<b style='font-family:arial; color:red;'>$name :</b> <p  style='font-family:arial; color:red;'>Erro! Imagem ultrapassa o limite de 20MB.</p>";
				else{
					if(move_uploaded_file($tmp, $folder.'/'.$id.'.jpg')){
						$sql = "INSERT INTO produto (id_produto, nome_produto, valor_produto, descricao, tipo, quantidade) VALUES ('$id', '$nome', '$valor', '$desc', '$tipo', '$quant')";
						//conexão com o banco de dados
						$con=mysqli_connect($host, $user, $pass) or die ("Configuração de Banco de Dados Errada!");
						//Selecionando o banco de dados...
						mysqli_select_db($con, $db) or die ("Banco de Dados Inexistente!");
						//Inserindo os dados
						mysqli_query($con, $sql) or die ("<font style=Arial color=red><h1>Houve um erro na gravação dos dados</h1></font>");
						echo "<font style=Arial color=green font-weight=bold><b>".$name.": Cadastro efetuado com sucesso! O arquivo foi salvo como ".$id."</b></font><br>";						
					}else{
						echo "<font style=Arial color=red font-weight=bold><b>".$name.": Falha!</b></font><br>";
					}													
				}
			}	
		}	
}

////////////////////////////////////////////////////////////	EDITAR PRODUTO	////////////////////////////////////////////////////////////


if(isset($_POST['editar_produto'])){		

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
			mysqli_query($con, $altera) or die('Error: ' . mysqli_error($con));
			if($altera){
				echo'<script>location.href=("../upload/gerenciador.php");alert("Produto alterado com sucesso!");</script>';
			}else{
				echo'<script>location.href=("../upload/gerenciador.php");alert("Erro ao alterar o produto!");</script>';
			}
			
}

////////////////////////////////////////////////////////////	EDITAR PRODUTO	////////////////////////////////////////////////////////////


if(isset($_POST['editar_arquivo'])){		

		$profissional = $_POST['profissional'];
		$id = $_POST['id'];
		
		$altera = "UPDATE arquivo SET profissional = '$profissional' WHERE id_arquivo = '$id'";		

			//conexão com o banco de dados
			$con=mysqli_connect($host, $user, $pass) or die ("Configuração de Banco de Dados Errada!");
			//Selecionando o banco de dados...
			mysqli_select_db($con, $db) or die ("Banco de Dados Inexistente!");
			//Inserindo os dados
			mysqli_query($con, $altera) or die('Error: ' . mysqli_error($con));
			if($altera){
				echo'<script>location.href=("../upload/gerenciador.php");alert("Foto da galeria editada com sucesso!");</script>';
			}else{
				echo'<script>location.href=("../upload/gerenciador.php");alert("Erro ao editar a foto!");</script>';
			}
			
}
?>




