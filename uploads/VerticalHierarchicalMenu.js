﻿(function($){
	$.fn.setVerticalHierarchicalMenu = function(params){
		var p = {
			delayShow:300,		//Задержка перед появлением выпадающего меню (ms)
			delayHide:300	    //Задержка перед исчезанием выпадающего меню (ms)
		};
		if (params) {
			$.extend(p, params); 
		}
		return this.each(function(){
			var 
			menuWrap = $(this),
			menuWrapWidth = menuWrap.outerWidth(), //находим ширину объёмлющего меню
			menuWrapLeft = menuWrap.offset().left, //находим левый отступ
			menuSubSub = $('ul',menuWrap)          //находим все ul-ки 
			menuWrap.addClass('VerticalHierarchicalMenu');
			menuSubSub.each(function(){
				var mArrowRight = $('<div>').addClass('arrow-right'), //создаём див с классом arrow-right
				mSubSub = $(this),
				mSubList = mSubSub.closest('li'),  //ближайшие дочерние списки 
				mSubLink = mSubList.children('a').append(mArrowRight), //к дочерним спискам добавляем стрелочки
				mSubArrow = $('<div>').addClass('arrow-left').prependTo(mSubSub),//к текущему диву добавляем срелочку влево
				mSubArrow2 = $('<div>').addClass('arrow-left2').prependTo(mSubSub), 
				mFuncId = function(){},
				mFuncIdOut = function(){};
				
				mSubList.on('mouseenter',function(){
					clearTimeout(mFuncIdOut);
					mHoverLink = $(this).children('a'); //найдём текст
					mFuncId = setTimeout(function(){    //установим 
						mHoverLink.next('ul').children('li').width(mHoverLink.next('ul').width());	//correct width in ie7			
						mSubArrow.css({top:mSubLink.outerHeight()/2 - 5});
						mSubArrow2.css({top:mSubLink.outerHeight()/2 - 5});
						var 
						mSubSubLeft = mSubLink.position().left + mSubLink.outerWidth(),
						p1 = (mSubLink.closest('ul').outerWidth()-mSubLink.closest('ul').width())/2;
						mSubSub.css({top:(mSubLink.position().top - p1)});	
						mSubSub.css({left:mSubSubLeft});
						mSubSub.show();
						var w3 = $(window).width();
						var w6 = (mSubSub.offset().left + mSubSub.outerWidth());
						if(w6 >= w3){
							mSubSub.closest('ul').addClass('toLeft');
							mSubSubLeft = -mSubSub.outerWidth();
						}
						if(mSubSub.parents('ul').hasClass('toLeft')){
							mSubSubLeft = -mSubSub.outerWidth();
						}
						mSubSub.css({left:mSubSubLeft});				
						mSubLink.addClass('active');
					},p.delayShow)
				})
				mSubList.on('mouseleave',function(){
					clearTimeout(mFuncId);
					mFuncIdOut = setTimeout(function(){
						
						mSubSub.hide();
						mSubLink.removeClass('active')
					},p.delayHide)
				});
			});
			menuWrapWidth = menuWrap.outerWidth();
			menuWrapLeft = menuWrap.offset().left;
			$(window).resize(function(){
				menuWrapWidth = menuWrap.outerWidth();
				menuWrapLeft = menuWrap.offset().left;	
			});
		});
	};
})(jQuery);
    
