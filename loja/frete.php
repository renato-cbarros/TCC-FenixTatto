<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>:: WebMaster.PT - Implementando um Carrinho de Compras ::</title>
	<link rel="stylesheet" type="text/css" href="css/frete.css" />
	<script type="text/javascript" src="../js/jquery-ajax.js"></script>	
</head>
<body>
<div id="wrapper">
<h3>

</h3>
<form id="form-pesquisa-repasse" action="calcularFrete.php" method="post" class="formMain formSearch wsizep100" onsubmit="submitForm(this); return false;">
<fieldset>
<legend>Calcular Frete</legend>
<label for="servico" class="wsize015">
<span class="nameField">Envio</span>
<select id="servico" name="servico" title="Serviços dos Correios" class="select" tabindex="1">
<option value="41106">PAC</option>
<option value="40010">SEDEX</option>
</select>
</label>
<label class="wsize010" for="cep-destino">
<span class="nameField">CEP Destino</span>
<input id="cep-destino" class="text" type="text" value="" maxlength="9" title="CPF destino" name="cep-destino" tabindex="2"/>
</label>
<label for="pesquisar" class="wsize010">
<input type="submit" id="pesquisar" name="pesquisar" tabindex="3" class="button inline"  value="Pesquisar" />
</label>
</fieldset>
</form>
<span>* Digitar somente número no CEP</span>
<br />
<span id="value"></span>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<script type="text/javascript">
function submitForm(form) {
form.request({
onComplete: function(transport){

if(transport.responseText !=-1)  {
$('value').innerHTML = transport.responseText;
} else {
form.reset();
$('value').innerHTML = 'Erro ao consultar';
}
}
});
return false;
}

</script>
</body>
</html>
