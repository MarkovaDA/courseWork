
(function($){
	$.fn.setInline2DMenu = function()
	{   
		var main_obj = $(this);
		main_obj.addClass('inline2DMenu');
		function forward(number, current_number)
		{
			var total_width = 0;
			$('.my_vidget_simple_menu').children().each(function(index,obj){
			if (index >= number && index < current_number)
			total_width+=$(obj).outerWidth() + parseInt($(obj).css('margin-right'));
			});
			return total_width;
		}
		function back(number, current_number)
		{
			var total_width = 0;
			$('.my_vidget_simple_menu').children().each(function(index,obj){
				if (index >= current_number && index < number)
				total_width+=$(obj).outerWidth() + parseInt($(obj).css('margin-right'));
			});
			return total_width;
		}
		var obj = $('.my_vidget_simple_menu').find('.selected');
		var number = 0; 
		var count = $('.my_vidget_simple_menu').children().length; 
		var delta;
		$(main_obj).css('width', $('.my_vidget_simple_menu div').eq(0).css('width'));
		$('.my_vidget_simple_menu div').mouseenter(function(){
			var cur_number = $(this).index(); 	
			if (cur_number != number){
			var fut_width = $(this).css('width'); 
			var cur_width = forward(number, cur_number);	
			if (cur_number > number)  delta = '+='+cur_width;
			else {
				var cur_width = back(number, cur_number); 
				delta = '-='+cur_width;
			}
			main_obj.animate({
			'margin-left': delta,
			'width': fut_width
			}, 100, function(){
					  
			});
			number = $(this).index();
			}
		});		
	};
})(jQuery);