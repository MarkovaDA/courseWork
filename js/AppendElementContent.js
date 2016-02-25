/*при загрузке старнички подгружать из базы данных ?*/
var fileNames = ["Simple2DDroppingMenu", "Inline2DMenu", "VerticalHierarchicalMenu", "Compact2DMenu", "InlineButton3DMenu", "InlineSliding2DMenu"];

/*подгрузка CSS*/
function plugCSS(way){
	var st = document.createElement("link");
	st.setAttribute("rel","stylesheet");
	st.setAttribute("href",way);
	document.body.appendChild(st);
}
/*экранируем угловый скобки в html-тегах*/
function scanHTML(text){
	var regex1 = new RegExp('<', 'g');
	var regex2 = new RegExp('>', 'g');
	return text.replace(regex1,'&lt;').replace(regex2,'&gt;');
}

$(document).ready(function(){
	if ($('#user_login').text().length > 0){
			$('#for_btn')
			.append('<button id="add_to_lib"  class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> в библиотеку</button><br><br>');
	}
	$('#add_to_lib').hide();
	$('.vidget').click(function(){ 
		var elem_id = $(this).attr('id');
		var download_url = 'uploads/' + fileNames[elem_id] + '.zip';
		$('#download_curr_elem a').remove(); //удалить предыдущий текущий элемент
		$('#download_curr_elem').append('<a href="' + download_url + '">Текущий элемент</a>');
		//проверка, если текущий элемент есть в библиотеке юзера, кнопка остается заблокированной
		$.ajax({
			type: 'POST',
			data: 'elem_id=' + elem_id + '&user_id=' + $('#user_id').attr('value'),
			url: 'php_scripts/append_code_element.php?action=isThereInLibrary',
			success: function(data){
				if (data == 'no') {
					$('#add_to_lib').attr('disabled', false);
					$('#add_to_lib').find('span').removeClass('glyphicon-ok').addClass('glyphicon-plus');
				}
				else {
					$('#add_to_lib').attr('disabled', true);
					$('#add_to_lib').find('span').removeClass('glyphicon-plus').addClass('glyphicon-ok');
				}
			}
		});
		$('#add_to_lib').attr('value', elem_id); $('#add_to_lib').show();
		//запрос на внедрение html-кода на страницу,подключение стиля, javascript-сценария
		$.ajax({
			 type: 'POST',
			 data: 'elem_id=' + elem_id,
			 url: 'php_scripts/append_code_element.php?action=getCode',
			 success: function(data){					
				$('#for_elem').empty();
				$('#for_elem').append(data);
				plugCSS('uploads/' + fileNames[elem_id] + ".css");
				window[fileNames[elem_id]]();
			}			 
		});
		//запрос на внедрение демонстрационного кода				
		$.ajax({
			 type: 'POST',
			 dataType: 'json',
			 data: 'elem_id=' + elem_id,
			 url: 'php_scripts/append_code_element.php?action=getDemo',
			 success: function(data){
				$.each(data.codes, function(){
					$('#tab1').empty(); $('#tab2').empty();$('#tab3').empty();
					$('#tab1').append("<pre class='brush: xml'>" + scanHTML(this['html']) + "</pre>");
					$('#tab2').append("<pre class='brush: javascript'>" + this['js'] + "</pre>");
					$('#tab3').append("<pre class='brush: css'>" + this['css'] + "</pre>");					
				});
				SyntaxHighlighter.config.bloggerMode = true;
				SyntaxHighlighter.defaults['toolbar'] = false;
				SyntaxHighlighter.highlight();
			}			 
		});
 });
	$('#add_to_lib').click(function(){
		$(this).find('span').removeClass('glyphicon-plus').addClass('glyphicon-ok');
		/*ajax-запрос на добавление элемента в библиотеку юзера*/
		$.ajax({
			 type: 'POST',
			 data: 'elem_id=' + $(this).attr('value') + '&user_id=' + $('#user_id').attr('value'),
			 url: 'php_scripts/append_code_element.php?action=addToLibrary',
			 success: function(data){
				$('#add_to_lib').attr('disabled', true);
			 }			 
		});
	});
 });
 /*набор функций,связанных с каждым загружаемым элементом*/
 function Simple2DDroppingMenu(){}
 function Inline2DMenu(){$('#navigation_menu').setInline2DMenu();}
 function VerticalHierarchicalMenu(){
	 $('#navigation_menu').setVerticalHierarchicalMenu({
		delayShow: 300,
		delayHide: 300
	});
 }
 function Compact2DMenu(){
	 $('#navmenu').setCompact2DMenu();
 }
 function InlineButton3DMenu(){
	 $('#navigation_menu').setInlineButton3DMenu();
 }
 function InlineSliding2DMenu(){
	$('#navigation_menu').setInlineSliding2DMenu(); 
 }
 