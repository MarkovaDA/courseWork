
var fileNames = ["Simple2DDroppingMenu", "Inline2DMenu", "VerticalHierarchicalMenu"];

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
	
	$('.vidget').click(function(){
		if ($('#user_login').text().length > 0){
			//опции настройки для зарегистрированных пользователей
		}
		else
		{   
			var elem_id = $(this).attr('id'); 
			var download_url = 'uploads/' + fileNames[elem_id] + '.zip';
			$('#download_curr_elem a').remove(); //удалить предыдущий текущий элемент
			$('#download_curr_elem').append('<a href="' + download_url + '">Текущий элемент</a>');
			
			//запрос на внедрение html-кода на страницу,подключение стиля, javascript-сценария
			$.ajax({
				 type: 'POST',
				 data: 'elem_id=' + elem_id,
				 url: 'php_scripts/append_code_element.php?action=getCode',
				 success: function(data){
					$('#view_col').empty();
					$('#view_col').append('<p class="center-selection">Демонстрация виджета</p>');
					$('#view_col').append(data);
					plugCSS('uploads/' + fileNames[elem_id] + ".css");
					window[fileNames[elem_id]]();
				}			 
			});
			//запрос на внедрение кода демонстрации			
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
		}
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

 