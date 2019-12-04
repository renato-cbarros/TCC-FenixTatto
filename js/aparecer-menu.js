$(function() {
	$(window).scroll(function(){
		var topo = $('#background-mobile').height(); // altura do topo
		var scrollTop = $(window).scrollTop(); // quanto foi rolado a barra
		if(scrollTop > topo){
			$('header').css({'opacity' : '1', "transition-duration":"0.5s", "-webkit-transition-duration":"0.5s", "-moz-transition-duration":"0.5s"});
			$('#rodape-fixo').css({'opacity' : '1', "transition-duration":"0.5s", "-webkit-transition-duration":"0.5s", "-moz-transition-duration":"0.5s"});
		}else{
		$('header').css({'opacity' : '0', "transition-duration":"0.5s", "-webkit-transition-duration":"0.5s", "-moz-transition-duration":"0.5s"});
		$('#rodape-fixo').css({'opacity' : '0', "transition-duration":"0.5s", "-webkit-transition-duration":"0.5s", "-moz-transition-duration":"0.5s"});
		}               
	});
});