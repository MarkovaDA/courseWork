(function($){

$.fn.setCompact2DMenu = function(div){
$(this).addClass('Compact2DMenu');
var	div_wrapped_in_compact_menu = '#' + $(this).attr('id');
function back()
{	
	var header = $(div_wrapped_in_compact_menu + ' div').detach();
	$(div_wrapped_in_compact_menu).empty();
	$(header).appendTo($(div_wrapped_in_compact_menu));
	$(menu).find('li').each(function(index, elem){
	      if ($(elem).text() == $(parent).text()){
			$(div_wrapped_in_compact_menu).append($(elem).parent().clone(true,true).children()).click(function(){
			if ($(div_wrapped_in_compact_menu + ' li').css('opacity') == 0)
				
				$(div_wrapped_in_compact_menu + ' li').animate({
				//'width': '118px',
				//'opacity': 1
				}, 200, function(){return;});
			});			
			parent = $(elem).parent().parent().clone(true,true);
		}
	});
	$(div_wrapped_in_compact_menu + ' li').css('width', '0px').css('opacity', '0');
	//найти parent у текущего parent	
	$(div_wrapped_in_compact_menu + ' li').bind('click', forward);
	$(div_wrapped_in_compact_menu + ' .prev').bind('click', back);	
}

function forward()
{		
	if (!$(this).hasClass('prev') && $(this).attr('data-toggle') != 'tab' && $(this).children().length > 0){
		parent = $(this).clone(true, true);
		var header = $(div_wrapped_in_compact_menu + ' div').detach();
		$(div_wrapped_in_compact_menu).empty();
		$(header).appendTo($(div_wrapped_in_compact_menu));
		$(div_wrapped_in_compact_menu).append($(this).clone(true, true).children()).click(function(){
			if ($(div_wrapped_in_compact_menu + ' li').css('opacity') == 0)
			$(div_wrapped_in_compact_menu + ' li').animate({
			'width': '118px',
			'opacity': 1
			}, 200, function(){});
		});	
		$(div_wrapped_in_compact_menu + ' li').css('width', '0px').css('opacity', '0');
		$(div_wrapped_in_compact_menu + ' li').bind('click', forward);
		$(div_wrapped_in_compact_menu + ' .prev').bind('click', back);
	}	
}

$(div_wrapped_in_compact_menu + ' div').attr('id','header_compact_menu');
var menu = $(div_wrapped_in_compact_menu).clone(true, true);

$('li').bind('click', forward);
$(div_wrapped_in_compact_menu + ' .prev').bind('click', back);

$(div_wrapped_in_compact_menu + ' div').click(function(){    
	$(div_wrapped_in_compact_menu + ' li').animate({
	     'width': '118px',
		 'opacity': 1
	}, 300, function(){return;});
});
}
})(jQuery);