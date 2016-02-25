
$(document).ready(function(){
	$('#unlogin').click(function(){
		 $.ajax({
			 type: 'POST',
			 url: 'php_scripts/unlogin.php',
			 success: function(data){
				$('input[type=hidden]').val("");
				$('#user_login').text("");
				$('#for_btn').remove();
				$('#menu .row ul').children().eq(2).remove();
			 }			 
		});
	});
});