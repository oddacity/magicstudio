var windowH = $(window).height();
var windowW = $(window).width();
var masthead = $('#masthead').outerHeight();
var footer = $('#colophon').outerHeight();

function backgroundResize(){
	$(".fullscreen").each(function(i){
	    var path = $(this);
	    path.css("height", windowH);
	});
}

function introText() {
	var topH = windowH - (masthead + footer);
	var introH = $('.intro').outerHeight();
	var offset = topH - introH;

	$('.intro').css({
		'margin-top'	: offset/4,
		'margin-bottom' : offset/4,
	});
}

function openModal() {
	$(this).css('display', 'block');

    var dialog = $(this).find('.modal-content');
    var offset = ($(window).height() - dialog.height()) / 2;
  
    dialog.css('margin-top', offset);

    $('html').addClass('no-scroll');
}

function radioStyles(wrapper) {
	$(wrapper).find('input[type=radio]:checked').parent().addClass('checked');

	$(wrapper).on('change',function(){
		$(this).find('input[type=radio]').parent().removeClass('checked');
		$(this).find('input[type=radio]:checked').parent().addClass('checked');
	});
}

$(document).ready(function(){

	$(".lazy").lazyload({
	    effect : "fadeIn",
	});

	backgroundResize();
	
	if ($('body').hasClass('home')) {
		introText();
	}

	$('.main-navigation').find('a').addClass('animsition-link');
  
	$(".animsition").animsition({

		inClass               :   'fade-in',
		outClass              :   'fade-out',
		inDuration            :    1000,
		outDuration           :    500,
		linkElement           :   '.animsition-link',
		// e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
		loading               :    true,
		loadingParentElement  :   'body', //animsition wrapper element
		loadingClass          :   'animsition-loading',
		unSupportCss          : [ 'animation-duration',
		                          '-webkit-animation-duration',
		                          '-o-animation-duration'
		                        ],
		//"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
		//The default setting is to disable the "animsition" in a browser that does not support "animation-duration".

		overlay               :   false,

		overlayClass          :   'animsition-overlay-slide',
		overlayParentElement  :   'body'
	});

	// Close Modals
	$('.modal-close').click(function(){
		$(this).closest('.modal').modal('hide');
	});

	// Vertically Align Modals
	$('.modal').on('show.bs.modal', openModal);
	$('.modal').on('hide.bs.modal', function(){
		$('html').removeClass('no-scroll');
		location.hash = '#/';
	});

	// Ninja Forms 
	radioStyles('.inquiry-radio-styles-wrap');
	radioStyles('.budget-radio-styles-wrap');

	// Add URL Paramaters for Modals
	$('.modal-trigger').click(function(){
	    var hash = $(this).data('url');
	    location.hash = hash;
	});

	// Open Modal Based on URL Paramaters
	var param = document.URL.split('#')[1];
	var current = $('.modal[data-url="' + param + '"]');
	$(current).modal('show');

});

$(window).load(function(){
	// Resize Team Photos
	if (windowW >= 767) {
		$('.team-member').each(function(){
			var itemH = $(this).find('.bio').outerHeight(true);
			$(this).find('.photo').css('height',itemH);
		});
	}
});

$(window).resize(function(){
	backgroundResize();
	introText();
	$('.modal:visible').each(openModal);
});

