var windowH = $(window).height();

function backgroundResize(){
	$(".fullscreen").each(function(i){
	    var path = $(this);
	    path.css("height", windowH);
	});
}

function centerModal() {
    $(this).css('display', 'block');

    var dialog = $(this).find('.modal-content');
    var offset = ($(window).height() - dialog.height()) / 2;
  
    dialog.css('margin-top', offset);
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
		$(this).closest('.modal').attr('aria-hidden','true').hide();	
		$('body').removeClass('modal-open');
		$('.modal-backdrop').hide();
	});

	// Vertically Align Modals
	$('.modal').on('show.bs.modal', centerModal);

	// Ninja Forms 
	radioStyles('.inquiry-radio-styles-wrap');
	radioStyles('.budget-radio-styles-wrap');

});

$(window).load(function(){
	// Resize Team Photos
	$('.team-member').each(function(){
		var itemH = $(this).find('.bio').outerHeight(true);
		$(this).find('.photo').css('height',itemH);
	});
});

$(window).resize(function(){
	backgroundResize();
	$('.modal:visible').each(centerModal);
});

