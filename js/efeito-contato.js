$(document).ready(function(){
	$("#mapa-a").click(function(){
		$("#mapa").css({"display":"block"});
		$("#telefone").css({"display":"none"});
			$("#email").css({"display":"none"});
	});
	$("#telefone-a").click(function(){
		$("#telefone").css({"display":"block"});
		$("#mapa").css({"display":"none"});
		$("#email").css({"display":"none"});
	});
	$("#email-a").click(function(){
		$("#email").css({"display":"block"});
		$("#telefone").css({"display":"none"});
		$("#mapa").css({"display":"none"});
	});
	$("#botao-agendamento").click(function(){
		$("#aparece_telefone").css({"display":"block", "transition-duration":"0.3s", "-webkit-transition-duration":"0.3s", "-moz-transition-duration":"0.3s"});
		$("body").css({"overflow":"hidden"});
	});
	$("#fechar_texto_telefone").click(function(){
		$("#aparece_telefone").css({"display":"none", "transition-duration":"0.3s", "-webkit-transition-duration":"0.3s", "-moz-transition-duration":"0.3s"});
		$("body").css({"overflow":"auto"});
	});
});