function mostraSenha(){
		document.getElementById("senha").type = "text";
		document.getElementById("mostra_senha").style.display = "none";
		document.getElementById("esconde_senha").style.display = "inline";
	}
function escondeSenha(){
	document.getElementById("senha").type = "password";
	document.getElementById("mostra_senha").style.display = "inline";
	document.getElementById("esconde_senha").style.display = "none";
}

function mostraConfirmaSenha(){
		document.getElementById("confirmar_senha").type = "text";
		document.getElementById("mostra_confirma_senha").style.display = "none";
		document.getElementById("esconde_confirma_senha").style.display = "inline";
	}
function escondeConfirmaSenha(){
	document.getElementById("confirmar_senha").type = "password";
	document.getElementById("mostra_confirma_senha").style.display = "inline";
	document.getElementById("esconde_confirma_senha").style.display = "none";
}