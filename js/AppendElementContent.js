var hasDownload = false;
var arrayCSS = ["css/SimpleDroppingMenu-style.css"];
var fileNames = ["Simple2DDroppingMenu"];

function plugCSS(way){
	var st = document.createElement("link");
	st.setAttribute("rel","stylesheet");
	st.setAttribute("href",way);
	document.body.appendChild(st);
}
$(document).ready(function(){
	$('.vidget').click(function(){
		if ($('#user_login').text().length > 0){
			//опции настройки для зарегистрированных пользователей
		}
		else
		{
			if (hasDownload) return;
			var elem_id = $(this).index(); var download_url = 'uploads/' + fileNames[elem_id] + '.rar';				
			$('#download_curr_elem').append('<a href="' + download_url + '">Текущий элемент</a>');
			$.ajax({
				 type: 'POST',
				 data: 'elem_id=' + elem_id,
				 url: 'php_scripts/append_code_element.php?action=getCode',
				 success: function(data){
					$('#view_col').append(data);
					plugCSS(arrayCSS[elem_id]);
					$('.tab-content').show();
				 }			 
			});
			hasDownload = true;
		}
 });
 });