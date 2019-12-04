//Rolagem do navegador ao clicar em um menu
$(document).ready(function() {
	$('a[href^="#"]').on('click',function (e) {
		e.preventDefault (); var target = this.hash,
		$target = $(target); $('html, body').stop().animate ({
		'scrollTop': $target.offset().top
		}, 800, 'swing', function () {
		window.location.hash = target;
		});
	});
});