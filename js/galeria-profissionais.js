//Troca de fotos ao clicar nos profissionais
	$(document).ready(function(){
		$("#profissional-1").click(function(){
			$("#imagem-profissional-1").css({"border":"3px solid rgba(0, 255, 0, 0.4)", "box-shadow":"0 0 30px rgba(0, 255, 0, 0.4)"});
			$("#imagem-profissional-2").css({"border":"3px solid rgba(255, 0, 0, 0.4)", "box-shadow":"0 0 0 rgba(0, 255, 0, 0)"});
			$("#imagem-profissional-3").css({"border":"3px solid rgba(255, 0, 0, 0.4)", "box-shadow":"0 0 0 rgba(0, 255, 0, 0)"});
			$("#galeria-profissional-1").css({"display":"inline"});
			$("#galeria-profissional-2").css({"display":"none"});
			$("#galeria-profissional-3").css({"display":"none"});
		});
		$("#profissional-2").click(function(){
			$("#imagem-profissional-1").css({"border":"3px solid rgba(255, 0, 0, 0.4)", "box-shadow":"0 0 0 rgba(0, 255, 0, 0)"});
			$("#imagem-profissional-2").css({"border":"3px solid rgba(0, 255, 0, 0.4)", "box-shadow":"0 0 30px rgba(0, 255, 0, 0.4)"});
			$("#imagem-profissional-3").css({"border":"3px solid rgba(255, 0, 0, 0.4)", "box-shadow":"0 0 0 rgba(0, 255, 0, 0)"});
			$("#galeria-profissional-1").css({"display":"none"});
			$("#galeria-profissional-2").css({"display":"inline"});
			$("#galeria-profissional-3").css({"display":"none"});
		});
		$("#profissional-3").click(function(){
			$("#imagem-profissional-1").css({"border":"3px solid rgba(255, 0, 0, 0.4)", "box-shadow":"0 0 0 rgba(0, 255, 0, 0)"})
			$("#imagem-profissional-2").css({"border":"3px solid rgba(255, 0, 0, 0.4)", "box-shadow":"0 0 0 rgba(0, 255, 0, 0)"})
			$("#imagem-profissional-3").css({"border":"3px solid rgba(0, 255, 0, 0.4)", "box-shadow":"0 0 30px rgba(0, 255, 0, 0.4)"});
			$("#galeria-profissional-1").css({"display":"none"});
			$("#galeria-profissional-2").css({"display":"none"});
			$("#galeria-profissional-3").css({"display":"inline"});
		});
	});