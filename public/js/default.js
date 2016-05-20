$(document).ready(function() {

	$('.menu').click(function() {
		
		// Back to normal
		$('.tab-content .box-content').hide();
		$('.menu.active').removeClass('active');

		var classes = $(this).attr('class').split(' ');
		var content = classes[classes.length-1];

		$(this).addClass('active');
		$('#'+content).show();
	});

	$('.search-btn').click(function() {
		if ($('.search-form').is(':visible')) {
			$('.search-form').slideUp();
			$('.tab-panel').animate({'margin-top':'40px'});
		} else {
			$('.search-form').slideDown();
			$('.tab-panel').animate({'margin-top':'100px'});
			$('.search-in').focus();
		}
	});

	// TO TOP
	$('.totop-btn').hide();
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.totop-btn').fadeIn();
		} else {
			$('.totop-btn').fadeOut();
		}
	});

	$('.totop-btn').click(function() {
		$('html, body').animate({scrollTop: 0}, 800);
		return false;
	});

	// Check sidebar width
	var changeSidebarWidth = function() {
		var sidebarWidth = $('#sidebar').width();
		if (sidebarWidth < 200) {
			$(".sidebar-menu li").css({'display':'block'});
		} else {
			$(".sidebar-menu li").css({'display':'inline'});
		}
	}
	$(window).resize(changeSidebarWidth);
	$(window).load(changeSidebarWidth);

	// Home link
	$('.sidebar-img').click(function() {
		window.location.href='/';
	});
});