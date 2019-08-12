$(document).ready(function (event) {
	var $links = $('.scroll-menu a');
	$links.on('click', function (e) {
		e.preventDefault();

		var link = $(this);
		var target = link.attr('href');

		$("html, body").animate({
			scrollTop: $(target).offset().top - 50
		}, 700);
	});
});
