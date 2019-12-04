<?php
	require_once("connect.php");
	$results = $connect->query("SELECT * FROM arquivo ORDER BY id_arquivo DESC");
	$resultsval = $connect->query("SELECT * FROM arquivo WHERE profissional = 'Marivaldo' ORDER BY id_arquivo DESC LIMIT 0,9");
	$resultswas = $connect->query("SELECT * FROM arquivo WHERE profissional = 'Washington' ORDER BY id_arquivo DESC LIMIT 0,9");
	$resultsalex = $connect->query("SELECT * FROM arquivo WHERE profissional = 'Alex' ORDER BY id_arquivo DESC LIMIT 0,9");
?>

<!DOCTYPE html>
<html lang="pt-Br">
	<head>
		<meta charset="UTF-8">
		<title>Fenix Tattoo</title>	
			<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
			<link rel="stylesheet" type="text/css" href="css/fontes.css"/>
			<link rel="stylesheet" type="text/css" href="css/desktop.css" media="all and (min-width:961px)"/>		
			<link rel="stylesheet" type="text/css" href="css/tablet_deitado.css" media="all and (min-width:801px) and (max-width:960px)"/>
			<link rel="stylesheet" type="text/css" href="css/tablet.css" media="all and (min-width:481px) and (max-width:800px)"/>
			<link rel="stylesheet" type="text/css" href="css/mobile.css" media="all and (max-width:480px)" />
			<link rel="stylesheet" type="text/css" href="css/lightbox.css"/>
			<script type="text/javascript" src="js/jquery-ajax.js"></script>
			<script type="text/javascript" src="js/jquery2.2.4.min.js"></script>
			<script type="text/javascript" src="js/lightbox.min.js"></script>
			<script type="text/javascript" src="js/main.js"></script> 
			<script type="text/javascript" src="js/rolagem.js"></script>
			<script type="text/javascript" src="js/galeria-profissionais.js"></script>
			<script type="text/javascript" src="js/aparecer-menu.js"></script>
			<script type="text/javascript" src="js/efeito-contato.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
	</head>
<script type="text/javascript">	

</script>

<body>	

<section id="home">
	<img id="background-desktop" class="background-index" src="images/propagandas/desktop_1.jpg">
	<img id="background-mobile" class="background-index" src="images/propagandas/mobile_1.jpg">		
</section>

<img id="imagem_background" src="images/background2.jpg">

	<header id="header_mobile">	
		<nav>	
			<div href="#" class="hamburger">
				<div class="line"></div>
				<div class="line"></div>
				<div class="line"></div>
			</div>
		<ul class=" menu">						
					<div id="menu-esquerda">
						<a class="hamburger" href="#home"><li class="menu-esquerda">Home</li></a>
						<a class="hamburger" href="#conheca_empresa"><li class="menu-esquerda">Conheça a Empresa</li></a>
						<a class="hamburger" href="#profissionais"><li class="menu-esquerda">Profissionais</li></a>
					</div>
					<div id="menu-direita">
						<a class="hamburger" href="loja/loja.php" target="_blank"><li class="menu-direita" >Loja Virtual</li></a>
						<a class="hamburger" href="#contato"><li class="menu-direita" >Contato</li></a>
						<a class="hamburger" href="#galeria"><li class="menu-direita" >Galeria</li></a>
					</div>
				<center><img id="logo-menu" src="images/logo-tipografica.png"></center>
			</ul>
		</nav>
	</header>
	
	<header id="header_desktop">	
		<nav>	
			<ul>						
				<div id="menu-esquerda">
					<a href="#home"><li class="menu-esquerda">Home</li></a>
					<a href="#conheca_empresa"><li class="menu-esquerda">Conheça a Empresa</li></a>
					<a href="#profissionais"><li class="menu-esquerda">Profissionais</li></a>
				</div>
				<div id="menu-direita">
					<a href="loja/loja.php" target="_blank"><li class="menu-direita" >Loja Virtual</li></a>
					<a href="#contato"><li class="menu-direita" >Contato</li></a>
					<a href="#galeria"><li class="menu-direita" >Galeria</li></a>
				</div>
				<center><img id="logo-menu" src="images/logo-tipografica.png"></center>
			</ul>
		</nav>
	</header>
		<div id="exterior">													
					
			<section id="conheca_empresa">		
				<div class="interior">					
					<center>
						<p class="titulo">O ESTÚDIO</p>
						<p class="subtitulo">Já nos conhece?</p>
					</center>
					<center>
						<div class="o-estudio">
								<a> 
									<img src="images/o-estudio/desc01.jpg"/> 					
								</a> 
							
								<a href="images/o-estudio/faixada.jpg" data-lightbox="gallery" data-title="Estúdio Fênix Tattoo">
									<img src="images/o-estudio/faixada.jpg"/>
								</a> 
							
								<a href="images/o-estudio/profissional.jpg" data-lightbox="gallery" data-title="Estúdio Fênix Tattoo">
									<img src="images/o-estudio/profissional.jpg"/>		
								</a> 
							
								<a href="images/o-estudio/sala-de-espera.jpg" data-lightbox="gallery" data-title="Estúdio Fênix Tattoo"> 
									<img src="images/o-estudio/aquario.jpg"/>		
								</a>
							
								<a href="images/o-estudio/sala-de-aplicacoes.jpg" data-lightbox="gallery" data-title="Estúdio Fênix Tattoo"> 
									<img src="images/o-estudio/sala-de-aplicacoes.jpg"/>
								</a> 
							
								<a> 
									<img src="images/o-estudio/desc02.jpg"/> 
								</a> 
						</div>							
						<br><br><br><a id="botao-agendamento" class="botao-agendamento"><img src="images/icone-calendario.png">Marque Sua Sessão</a>
					</center>
				</div> <!-- Fecha div interior-->
					<center>	
						<div id="aparece_telefone">
							<div id="aparece_telefone_fundo">
								<p id="texto-telefone">Ligue e agende sua sessão</p>
								<p class="texto-telefone"><img src="images/icones/telefoneicon.png">5839-0939<p>
								<p class="texto-telefone"><img src="images/icones/whatsappicon.png">011 9 8414-3350</p>
								<p class="texto-telefone">Segunda à Sábado: 10h às 19h</p>
								<p class="texto-telefone">Feriados: 10h às 15h</p>
								<p id="fechar_texto_telefone">X</p>
							</div>
						</div>
					</center>								
			</section>
				
				
			<!-- profissionais -->
			<section id="profissionais">
				<div class="interior">
					<center>
						<p class="titulo">Profissionais</p>
						<p class="subtitulo">Conheça nossos profissionais!</p>
					</center>	
					<center>																	
							<div class="profissional">
								<a id="profissional-2"><img class="imagem-profissionais" id="imagem-profissional-2" src="images/profissionais/profissional2.jpg"/></a>
								<a id="profissional-1"><img class="imagem-profissionais" id="imagem-profissional-1" src="images/profissionais/profissional1.jpg"/></a>
								<a id="profissional-3"><img class="imagem-profissionais" id="imagem-profissional-3" src="images/profissionais/profissional3.jpg"/></a>
							</div>
						
					<div id="galeria-profissionais">					
						<div id="galeria-profissional-1">
							<?php	
								while($row = $resultsval->fetch())
								{
									?>
										<a href="upload/uploads/<?php echo $row['nome_arquivo'];?>"data-lightbox="gallery" data-title="<?php echo $row['profissional']; ?>" > 
											<img src="upload/uploads/<?php echo $row['nome_arquivo'];?>" />
										</a>									
									<?php
								}
							?>	
						</div>
						
						<div id="galeria-profissional-2">
							<?php	
								while($row = $resultswas->fetch())
								{
									?>
										<a href="upload/uploads/<?php echo $row['nome_arquivo'];?>"data-lightbox="gallery" data-title="<?php echo $row['profissional']; ?>" > 
											<img  src="upload/uploads/<?php echo $row['nome_arquivo'];?>" />
										</a>									
									<?php
								}
							?>
						</div>
						
						<div id="galeria-profissional-3">
							<?php	
								while($row = $resultsalex->fetch())
								{
									?>
										<a href="upload/uploads/<?php echo $row['nome_arquivo'];?>"data-lightbox="gallery" data-title="<?php echo $row['profissional']; ?>" > 
											<img src="upload/uploads/<?php echo $row['nome_arquivo'];?>" />
										</a>									
									<?php
								}
							?>
						</div>					
					</div>
					</center>
				</div>
			</section>			
			
					
			<!-- Galeria -->
			<section id="galeria">					
				<div class="interior">	
					 <center>
						<p class="titulo">GALERIA</p>
						<p class="subtitulo">Já sabe o que vai tatuar?</p>
					 </center>				
					<div class="imagens">
						<?php	
							while($row = $results->fetch())
							{
								?>
									<a href="upload/uploads/<?php echo $row['nome_arquivo'];?>"data-lightbox="gallery" data-title="Tatuador: <?php echo $row['profissional']; ?>" > 
										<img class="imagem" src="upload/uploads/<?php echo $row['nome_arquivo'];?>" />
									</a>									
								<?php
							}
						?>						 
					</div>				
				</div>		<!--	Fecha interior	-->
			</section>		<!--	Fecha Section galeria	-->	

							
			<!-- CONTATO -->
			<section id="contato">
				<div class="interior">
					<center>
						<p class="titulo">CONTATO</p>
						<p class="subtitulo">Qualquer dúvida, fale conosco.</p>
						
						<div class="box-contato">
							<div>
								<a id="facebook-a" class="box-contato-a" href="https://www.facebook.com/val.tato?ref=ts&fref=ts" target="_blank"><p class="social">c</p></a> <!-- Face-->
							</div>
													
							<div>
								<a id="instagram-a" class="box-contato-a"><p class="social">f</p></a> <!-- Instagram-->
							</div>							
							<br/>
							<div>
								<a id="mapa-a" class="box-contato-a"><p class="simbolos">P</p></a> <!-- Venha Até Nós(Mapa)-->
							</div>
							
							<div>
								<a id="telefone-a" class="box-contato-a"><p class="simbolos">q</p></a> <!-- Ligue Para Nóis (telefone)-->
							</div>
								
							<div>
								<a id="email-a" class="box-contato-a"><p class="simbolos">E</p></a> <!-- Fale Conosco (email)-->
							</div>
						</div>
					</center>
				</div>
						<div id="mapa">
							<iframe id="localizacao" 
								src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.7485839760843!2d-46.770889784793496!3d-23.720670673380248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce4d92e2e426dd%3A0xfdb75911cb21ca45!2sR.+Crist%C3%B3v%C3%A3o+de+L%C3%A3+Cruz+-+Jardim+Aracati%2C+S%C3%A3o+Paulo+-+SP%2C+04949-100!5e0!3m2!1spt-BR!2sbr!4v1464545835302" 
							frameborder="0" allowfullscreen></iframe>
						</div>				
				
					<center>
						<div id="telefone">
							<div id="tamanho-telefone">
								<p> Telefone: 5839-0939<br>
								WhatsApp: 011 9 8414-3350 </p>
							</div>
						</div>
					</center>
				<div class="interior">
					<center>	
						<div id="email">
							<div id="tamanho-contato">
								<form method="post" action="email/processa_form.php">
									<p class="texto-contato" >
										<label class="texto-contato" for="nome-contato">Nome</label><br/>
										<input type="text" placeholder="Ex: João da Silva" class="input-contato" name="nome-contato" maxlength="90"/>
										<span class="hint">Informe seu Nome</span>
									</p>
									
									<p class="texto-contato" >
										<label class="texto-contato" for="email-contato">Email</label><br/>
										<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Ex: meuemail@email.com" class="input-contato" name="email-contato" maxlength="90"/>
										<span class="hint">Informe seu E-Mail</span>
									</p>
									
									<p class="texto-contato" >
										<label class="texto-contato" for="mensagem-contato">Mensagem</label><br/>
										<textarea class="input-contato" rows="5" name="mensagem-contato"> </textarea>
										<span class="hint">Envie-nos sua mensagem</span>
									</p>
									
									 <button style="cursor:pointer;" type="submit" class="enviar-mensagem">Enviar Mensagem</button>
								</form>
							</div>
						</div>						
					</center>					
				</div>
			</section>			
		</div>		<!--	Fecha exterior	-->	
		
		<div id="rodape-fixo">
			<center><a href="desenvolvedores/desenvolvedores.html" target="_blank">Desenvolvedores</a></center>
		</div>
				
		<div id="rodape">		
			<div id="informacoes">
				<p class="texto_informacao"> E-Mail: valtattoo@hotmail.com </p>
				<p class="texto_informacao"> Telefone: 5839 0939 </p>
				<p class="texto_informacao"> Endereço: R. Cristóvão De Lã Cruz, nº7 </p>
			</div>		

			<div class="direitos">
				<a href="upload/gerenciador.php" target="_blank">
					<p class="logo_rodape"> Fênix Tattoo </p>
					<p class="texto_direitos" > © 2016 Fênix Tattoo</p>
				</a>
			</div>
		</div>
	</body>
</html>