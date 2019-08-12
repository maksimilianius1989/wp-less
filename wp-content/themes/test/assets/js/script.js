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

	$("body").on("click", '.flat-app-btn', function (event) {
	    event.preventDefault();

	    var data = {
	    	action: 'flatapp',
	    	phone: $('input[name=phone]').val(),
	    	flat_id: $('input[name=id_flat]').val()
		};

	    $.post(window.wp.ajax_url, data, function (data) {
	        if (data.success) {
	            alert('Ura!');
	        } else {
	        	alert(data.err);
			}
	    }, 'json');
	});
});
