/*InlineButton3DMenu*/
(function($){
	$.fn.setInlineButton3DMenu = function(ul){
		$(this).addClass('InlineButton3DMenu');
		$(".InlineButton3DMenu li").click(function(){
		$(".InlineButton3DMenu .active").removeClass("active");
		$(this).addClass("active");
  });
}
})(jQuery);