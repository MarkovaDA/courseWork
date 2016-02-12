var menu = '';
var clearMenu = false;
$(document).ready(function(){
		
		var hasDownload = false;
		$('#SimpleDroppingMenu').click(function(){
		if (hasDownload) return;
		//если пользователь зарегистрирован, то восстанавливаем его настройки
		if ($('#user_login').text().length > 0) {
			//запрос на html-код
			$.ajax({
			 type: 'POST',
			 data: 'id=' + $('input:hidden').val(),
			 url: 'php_scripts/response.php?action=getHTMLCode',
			 success: function(data){
				 menu = data;	
				 $('#view_col').prepend(menu);
				 //$('#view_col').prepend('<p class="center">Демонстрация элемента</p>');
			 }			 
			});
			//css-код передать для распарсинга и исполнения
			$.ajax({
			 type: 'POST',
			 data: 'id=' + $('input:hidden').val(),
			 url: 'php_scripts/response.php?action=getCSSCode',
			 success: function(data){
				/*var unmakeCSS = new UnmakingCSSCode(new String(data));
				unmakeCSS.getSeparateCode();*/
			 }			 
			});
		}
		//структура меню по умолчанию
        else {
		 menu = '<ul id="navigation_menu">'+
	     '<li><a class="nosubs" href="#">Home</a></li>'+
	     '<li><a class="hsubs" href="#">Menu 1</a>'+
	         '<ul class="subs">'+
	             '<li><a href="#">Submenu 1</a></li>'+
	             '<li><a href="#">Submenu 2</a></li>'+
	             '<li><a href="#">Submenu 3</a></li>'+
	             '<li><a href="#">Submenu 4</a></li>'+
	             '<li><a href="#">Submenu 5</a></li>'+
	         '</ul>'+
	     '</li>'+
	     '<li><a class="hsubs" href="#">Menu 2</a>'+
	         '<ul class="subs">'+
	             '<li><a href="#">Submenu 2-1</a></li>'+
	             '<li><a href="#">Submenu 2-2</a></li>'+
	             '<li><a href="#">Submenu 2-3</a></li>'+
	             '<li><a href="#">Submenu 2-4</a></li>'+
	             '<li><a href="#">Submenu 2-5</a></li>'+
	             '<li><a href="#">Submenu 2-6</a></li>'+
	             '<li><a href="#">Submenu 2-7</a></li>'+
	             '<li><a href="#">Submenu 2-8</a></li>'+
	         '</ul>'+
	     '</li>'+
	     '<li><a class="hsubs" href="#">Menu 3</a>'+
	         '<ul class="subs">'+
	             '<li><a href="#">Submenu 3-1</a></li>'+
	             '<li><a href="#">Submenu 3-2</a></li>'+
	             '<li><a href="#">Submenu 3-3</a></li>'+
	             '<li><a href="#">Submenu 3-4</a></li>'+
	             '<li><a href="#">Submenu 3-5</a></li>'+
	         '</ul>'+
	     '</li>'+
	     '<li><a href="#" class="nosubs">Back</a></li></ul>';
		$('#view_col').prepend(menu); 	
		$('#view_col').prepend('<p class="center">Демонстрация элемента</p>');
	  }	

		var Interface = 
		'<input type="text" placeholder="<название пункта>" id="SimpleDroppingMenuPoint"><span> </span><input type="text" placeholder="<ссылка>" id="SimpleDroppingMenuPointHref"><br><br>'+ 
		'<textarea rows="10" id="SimpleDroppingMenuSubPoints" placeholder="<название подпункта><ссылка>"></textarea><br>'+
	    '<button type="button" class="btn btn-default" id="SimpleDroppingMenuAddPoint" style="width:220px;">добавить</button>'+
		'<button type="button" class="btn btn-default" id="SimpleDroppingMenuClear" style="margin-left:5px; width:210px;">очистить меню</button>';
		$('#elem_structure').append(Interface);
		
		$('input').css('border-color', '#750796');
		
		var params = 
		 '<br><p>Что настраиваем?</p>'+
         '<table><tr><td>Основание меню</td><td><input type="radio"  value = "#navigation_menu" name="optradio" class="controlbtn"></td></tr>'+
         '<tr><td>Выпадающая вкладка</td><td><input type="radio" value ="#navigation_menu ul" name="optradio" class="controlbtn"></td></tr>'+
         '<tr><td>Пункт</td><td><input type="radio" value = "#navigation_menu .hsubs, #navigation_menu .nosubs" name="optradio"></td></tr>'+
		 '<tr><td>Подпункт</td><td><input type="radio" value = "#navigation_menu .subs li a" name="optradio"></td></tr></table>';
		
		$('#elem_structure').append(params);
		/*$('#SimpleDroppingMenuAddPoint').bind('click', setSimpleDroppingMenu);*/
		$('#SimpleDroppingMenuClear').click(function(){
			clearMenu = true; $('#navigation_menu').remove();	
			newMenu = '<ul id="navigation_menu">';
		});
		/*(':radio').bind('click', recognizeWhatSet);*/
		$('input[class="edited"],input[class="bordersproperty"]').bind('click', setValue);
		$('select[class="edited"]').bind('click', setValue);
	    $('#btnDownload').bind('click', downloadFiles);		
	   hasDownload = true;
	});
});