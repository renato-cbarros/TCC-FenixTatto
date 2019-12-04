<?php

//Variáveis

$nome = $_POST['nome-contato'];
$email = $_POST['email-contato'];
$assuntomsg = $_POST['assunto-contato'];
$mensagem = $_POST['mensagem-contato'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

$arquivo = "
<style type='text/css'>
	body{
		margin:0px; font-family:verdana; font-size:0.8em; color:white;
	}
	a{
		color:white; text-decoration:none;
	}
	a:hover{
		color:rgba(200, 200, 200, 1); text-decoration:none;
	}
</style>

<html>
	<table width='510px' border='1' cellpading='1' cellspacing='1' bgcolor='#ccc'>
		<tr>
			<td = width'500px'>
				Nome:<b>$nome</b>
			</td>
		</tr>
		
		<tr>
		<td width='320px'>
				Email:<b>$email</b>
			</td>
		</tr>
			
		<tr>
			<td width='320px'>
				Assunto: <b>$assuntomsg</b><td>										
		</tr>

		
		<tr>
			<td width='320px'>
				Mensagem: <b>$mensagem</b>
			</td>
		</tr>
	</table>
";

//Enviar

//E-Mail's para quem será enviado o formulário
$emailenviar = "matheeusbatista@outlook.com"; //valtattoo@hotmail.com
$destino = $emailenviar;
$assunto = "Contato pelo Site www.fenixtattoo.com.br";

//É necessário indicar que o formato do e-mail é html
$headers = 'MIME-Version: 1.0'."\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: $nome <$email>";
	
$enviaremail = mail($destino, $assunto, $arquivo, $headers);
if($enviaremail){
	$msg = "E-MAIL ENVIADO COM SUCESSO!<br> O link será enviado para o e-mail fornecido no formulário";
	echo "<meta http-equiv='refresh' content='10:URL=contato.php'>";
}else{
	$msg = "ERRO AO ENVIAR E-MAIL!";
	echo "";
}
?>