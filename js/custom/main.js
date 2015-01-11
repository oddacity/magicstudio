var windowH = $(window).height();

function backgroundResize(){
	$(".fullscreen").each(function(i){
	    var path = $(this);
	    path.css("height", windowH);
	});
}

$(document).ready(function(){
	backgroundResize();
});

$(window).resize(function(){
	backgroundResize();
});