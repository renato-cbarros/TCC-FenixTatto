<?php
require_once("../connect.php");
?>
<?php
		session_start();    
			if(!isset($_SESSION['carrinho'])){
			$_SESSION['carrinho'] = array();
		}
       
      //adiciona produto
       
		if(isset($_GET['acao'])){
          
         //ADICIONAR CARRINHO
			 if($_GET['acao'] == 'add'){
				$id = intval($_GET['id']);
				if(is_numeric($id)){
					
				}else{
					header("Location:loja.php");
				}
				settype($id,"int");
				if(!isset($_SESSION['carrinho'][$id])){
				   $_SESSION['carrinho'][$id] = 1;
				}else{
				   $_SESSION['carrinho'][$id] += 1;
				}
			 }
          
         //REMOVER CARRINHO
			 if($_GET['acao'] == 'del'){
				$id = intval($_GET['id']);
				if(is_numeric($id)){
					
				}else{
					header("Location:loja.php");
				}
				settype($id,"int");
				if(isset($_SESSION['carrinho'][$id])){
				   unset($_SESSION['carrinho'][$id]);
				}
			 }
          
         //ALTERAR QUANTIDADE
			 if($_GET['acao'] == 'up'){
				if(is_array($_POST['prod'])){
				   foreach($_POST['prod'] as $id => $qtd){
					  $id  = intval($id);
					  $qtd = intval($qtd);
					  if(!empty($qtd) || $qtd <> 0){
						 $_SESSION['carrinho'][$id] = $qtd;						 
					  }else{
						 unset($_SESSION['carrinho'][$id]);
					  }
				   }
				}
			}
       
		}		
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Carrinho de Compras</title>
			<link rel="stylesheet" type="text/css" href="../css/fontes.css"/>
			<link rel="stylesheet" type="text/css" href="../css/medidas_header.css"/>
			<link rel="stylesheet" type="text/css" href="css/carrinho/desktop.css" media="all and (min-width:961px)"/>
			<link rel="stylesheet" type="text/css" href="css/carrinho/tablet_deitado.css" media="all and (min-width:801px) and (max-width:960px)"/>
			<link rel="stylesheet" type="text/css" href="css/carrinho/tablet.css" media="all and (min-width:481px) and (max-width:800px)"/>
			<link rel="stylesheet" type="text/css" href="css/carrinho/mobile.css" media="all and (max-width:480px)" />
			<script type="text/javascript" src="../js/jquery-ajax.js"></script>	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
	</head>
<body>
		<!--	Sessão	-->
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


<?php
	$nome = $_GET['nome'];
?>

<table id="produto">
		<thead>
			<tr id="titulo">
				<th class="titulo" id="titulo_foto"> </th>
				<th class="titulo" id="titulo_produto">Produto</th>
				<th class="titulo" id="titulo_qtd">Quantidade</th>
				<th class="titulo" id="titulo_subtotal">SubTotal</th>
			</tr>
		</thead>
		<form action="?acao=up&&email=<?php echo $email ;?>&&id=<?php echo $id;?>&&nome=<?php echo $nome;?>" method="post">		  
		<tbody>			
			<?php	
				if(count($_SESSION['carrinho']) == 0){
					echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
					$total = 0;	
				}else{
					require("../connect.php");
					$total = 0;						
					foreach($_SESSION['carrinho'] as $id_produto => $qtd){
						$results = $connect->query("SELECT * FROM produto WHERE id_produto = '$id_produto'");		
						($row    = ($results->fetch()));
							$id = $row['id_produto'];
							$nome  = $row['nome_produto'];
							$preco = number_format($row['valor_produto'], 2, ',', '.');
							$sub   = number_format($row['valor_produto'] * $qtd, 2, ',', '.');
							$desc = $row['descricao'];
							$tipo = $row['tipo'];
							$total += $row['valor_produto'] * $qtd;

						echo '
							<tr>       
								<td class="caracteristicas_produto foto_produto"> 
									<a href="../loja/uploads/'.$id.'.jpg"> 
										<img class="imagem" src="../loja/uploads/'.$id.'.jpg" />
									</a> 							
								</td>
								
								<td class="caracteristicas_produto nome_produto">
									<a id="nome_produto" href="comprar.php?Acao=Comprar&&id_produto='.$id.'&&email='.$email.'">'.$nome.'</a>
									<p id="valor_produto">Valor Unitário: R$'.$preco.'</p> 
									<p id="id_produto">Referência/ID: '.$id.'</p>
								</td>
								
								<td class="caracteristicas_produto qtd_produto">
									<input class="input_qtd_produto" type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" />
									<button class="button atualizar_carrinho" type="submit" >
										<img id="atualizar_carrinho" src="images/atualizar.png">
									</button>
									<br/>
									<a class="remove" id="remove" href="?acao=del&&id='.$id.'&&nome='.$nome.'&&email='.$email.'">Remover</a>
								</td>
								<td class="caracteristicas_produto valor_total_produto">R$ '.$sub.'</td>
							</tr>
						';
					}	//Fecha Foreach
					$total = number_format($total, 2, ',', '.');
				}									
			?>		
		</tbody>		
    </form>
</table>

		<div id="rodape">
			<a id="total"><b>Total </b>R$<?php echo $total ; ?></a>
			<a class="botao_acao" id="continuar_comprando" href='loja.php?email=$email'><img class="icone_rodape" src="images/continuar_comprando.png"/> Continuar Comprando</a>
			<button type="submit" class="botao_acao" id="finalizar_compra" name="compra"><img class="icone_rodape" src="images/finalizar_compra.png"/> Finalizar Compra</button>
			<a class="botao_acao" id="voltar" href="comprar.php?Acao=Comprar&&email=<?php echo $email; ?>&&id_produto=<?php echo $id; ?>">Voltar</a>
		</div> 
 
</body>
</html>