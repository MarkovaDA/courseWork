    //формирование пользовательского меню SimpleDroppingMenu
	var headerText = '<p class="center">Демонстрация элемента</p>';
	var newMenu = '<ul id="navigation_menu">';
	function setSimpleDroppingMenu(e){
	var temp = new String($('#view_col').html()); 
	temp = temp.substr(temp.indexOf("<ul"));
	//для зарегистрированных пользователей меню продолжается заново
	if (isRegister && !clearMenu)
	newMenu = temp;
	var index = newMenu.lastIndexOf('</ul>');
	if (index > 0)
	newMenu = newMenu.substring(0, index);
	
	//формируем меню	
	var pointsArr = $('#SimpleDroppingMenuSubPoints').val().split('\n');
	if (pointsArr.length >= 1 && $('#SimpleDroppingMenuSubPoints').val().length > 1){
		newMenu += '<li><a class="hsubs" href=' + $('#SimpleDroppingMenuPointHref').val() + '>' + $('#SimpleDroppingMenuPoint').val() + '</a>';
	newMenu+='<ul class="subs">';
	for(var i=0; i < pointsArr.length; i++)
	{
		var pointProperties = pointsArr[i].split('|');
		var pointName =	pointProperties[0];
		var pointHref =  pointProperties[1];
		newMenu += '<li><a href='+ pointHref+ '>'+pointName + '</a></li>';		
	}
	newMenu += '</ul>';}
	else{
		newMenu += '<li><a class="nosubs" href=' + $('#SimpleDroppingMenuPointHref').val() + '>' + $('#SimpleDroppingMenuPoint').val() + '</a>';
	}
	newMenu += '</li></ul>';
	var btnDown =  $('#view_col').find('#btnDownload');
	
	$('#view_col').empty();
	$('#view_col').append(headerText);
	$('#view_col').append(newMenu);	
	$('#view_col').append(btnDown); $('#btnDownload').bind('click', downloadFiles);
};