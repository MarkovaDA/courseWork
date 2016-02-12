	var isRegister = false;			
	var colorTab = true, borderTab = false, fontTab = false, shadowTab = false; //вкладки на панелм настройки	
	var makeCSS = new MakingCSSCode(); //генератор css-кода
	//при открытии вкладок - установка соответствующего индикатора
	$(document).ready(function(){
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {		
		if ($(this).attr('href') == '#panel2'){
			borderTab = true; 
		}
	    else {
			borderTab = false; 
		}
	});
	});
	var whatIsSeted = "#navigation_menu"; //настраиваемый элемент меню
	var isHoverState = false;
	//проверка начального состояния
	if ($('#radioHover').is(':checked')){
		isHoverState = true;
		if (colorTab = true)
			$('input[class="controlbtn"]').prop('disabled', true);
	}
	//определяем настраиваемый элемент
	function recognizeWhatSet(e){
		if ($(this).val() == "hover"){
			if (colorTab == true){
				//блокировка лейболов
				$('input[class="controlbtn"]').prop('disabled', true);
			}
			isHoverState = true; //будем настраивать hover
			return;
		}
		if ($(this).val() == "general"){
			isHoverState = false; //настраиваем обычное состояние
			//разблокировка лейболов
			$('input[class="controlbtn"]').prop('disabled', false);
			return;
		}
		if ($(this).is(':checked') && $(this).attr("class")!= "radiockeck" ){
			whatIsSeted = $(this).val(); 
		}		
	}			
	function setValue(e){
		$(this).change(function(){
			var str = "свойство: " + $(this).attr("name") + " значение:" + $(this).val();
			if (borderTab){
				var borderProp = $('input[name="border-width"]').val() + 'px ' + $('select[name="border-style"]').val() + ' ' +$('input[name="border-color"]').val();
				var borderRadiusValue = $('input[name="border-radius"]').val() + 'px';
				$(whatIsSeted).css('border-radius', borderRadiusValue);
				$(whatIsSeted).css($(this).attr("name"), borderProp);
				makeCSS.setPropertyForElement(whatIsSeted,"border-radius",  borderRadiusValue);
				makeCSS.setPropertyForElement(whatIsSeted, $(this).attr("name"),  borderProp);
				return;
			}
			else 
			{   var test = whatIsSeted + ':' + $(this).attr("name") + ':'+$(this).val();
				$(whatIsSeted).css($(this).attr("name"), $(this).val());
				makeCSS.setPropertyForElement(whatIsSeted,$(this).attr("name"), $(this).val());				
			}			
		});
	};
	//загрузка файлов с исходным кодом
	function downloadFiles(e){
		if (!isRegister)
		{
			alert("Войдите или зарегистрируйтесь для скачивания кода");
			return;
		}
		//отправляем html-код и css-код на сервер при нажатии на кнопку "загрузить"
		//эта функция не работает пока
		var htmlMenu = newMenu;
		var cssCode = makeCSS.printTotalCSS();
		if (htmlMenu == '<ul id="navigation_menu">') 
			htmlMenu = menu;
		 $.ajax({
			 type: 'POST',
			 data: 'htmlCode=' + htmlMenu +'&cssCode=' + cssCode + '&id=' + $('input:hidden').val(),
			 url: 'php_scripts/response.php?action=sentCode',
			 success: function(data){
			 }
		 });	
	}
	
	$(document).ready(function(){
	//проверка регистрации
	if ($('#user_login').text().length == 0){
			isRegister = false;
	}
	else isRegister = true;
	});
	

