var windowH = $(window).height();

function backgroundResize(){
	$(".fullscreen").each(function(i){
	    var path = $(this);
	    path.css("height", windowH);
	});
}

$(document).ready(function(){
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

	$('.service .modal').each(function(){
		var imgCount = 0;

		$(this).find('.modal-img').each(function(){
			imgCount++;
		});

		var imgCol = 12/imgCount;

		$(this).find('.modal-img').addClass('col-md-'+imgCol);
	});

});

$(window).resize(function(){
	backgroundResize();
});