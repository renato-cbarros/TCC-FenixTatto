<?php

$para = "matheeusbatista@outlook.com";
$assunto = "Contato pelo Site";

$nome = $_REQUEST['nome-contato'];
$email = $_REQUEST['email-contato'];
$msg = $_REQUEST['mensagem-contato'];

	$corpo = "<strong>Mensagem de Contato</strong><br><br>";
	$corpo .= "<strong>Nome: </strong>$nome";
	$corpo .= "<br><strong>Email: </strong>$email";
	$corpo .= "<br><strong>Mensagem: </strong>$msg";

	$header = "Content-Type: text/html; charset= utf-8\n";
	$header .= "From: $email Reply-to: $email\n";
	
	
@mail($para,$assunto,$corpo,$header);

echo "<script type='text/javascript'>alert('E-mail enviado com sucesso! Aguarde nossa resposta.');window.location.href'../index.php';</script>";
?>