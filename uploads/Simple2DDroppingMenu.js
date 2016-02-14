/*Simple2DDroppingMenu*/
(function($){
	$.fn.setSimple2DDroppingMenu = function()
	{   
		$(this).addClass('Simple2DDroppingMenu');
		$(this).find('li ul').addClass('subs');
		$(this).find('li').each(function(index, elem){
			if ($(elem).children().length == 1){
				$(elem).find('a').addClass('nosubs');
			}
			else if ($(elem).children().length > 1){
				$(elem).find('a').addClass('hsubs');
			}
		});
	};
})(jQuery);
/*Simple2DDroppingMenu*/



	

