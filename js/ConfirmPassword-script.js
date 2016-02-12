$(document).ready(function(){
	
	if ($('.btn').text() == 'регистрация'){
		//осуществить контроль через ajax за то, что такой пароль и логин не существуют
		var btn = $('.btn');
		$('.btn').remove();
		$('form').append('<input type="password" required placeholder="подтвердите пароль" name="PHP_CONF_PW"><i id="error_listener" style="color:red;"></i><br>');
		$('form').append(btn);		
		$('input[name="PHP_CONF_PW"]').keyup(function(){
			var sourcePassword = $('input[name="PHP_AUTH_PW"]').val();
			if (sourcePassword.indexOf($(this).val()) != 0 || ($(this).val().length == 0 && sourcePassword.length !=0)){
				$('#error_listener').html('<span class="glyphicon glyphicon-remove" style="vertical-align: middle;"></span> пароли не совпадают!');
			}
			else if ($(this).val().length > 0){
				$('#error_listener').empty();			    
				$('#error_listener').html('<span class="glyphicon glyphicon-ok" style="color:#750796; vertical-align: middle;"></span>');
			};		
		});
		//должно быть невозможно отправить запрос, если пароли не совпадают
	}
	
	
});