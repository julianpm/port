jQuery(document).ready(function($){

	$('.flyout-toggle').click(function(){
		$('.flyout').animate({
			top: 0
		}, 200, function(){
		});
	});

	$('.flyout-toggle-close').click(function(){
		$('.flyout').animate({
			top:-190
		}, 200, function(){
		});
	});

});