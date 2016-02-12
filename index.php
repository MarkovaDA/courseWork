<!DOCTYPE html>
<html>
<head>
<link   rel = "stylesheet"  href = "css/bootstrap.min.css">
<link   rel = "stylesheet"  href = "css/main-style.css">
<script src = "js/jquery-1.11.3.min.js"></script>
<script src = "js/bootstrap.min.js"></script>
<script src = "js/Unlogin-script.js"></script>
<script src = "js/AppendElementContent.js"></script> 
<meta   charset = "utf-8">
<title>Dynamic Vidgets Library</title>
<script>
<!--активация подсказки-->
$(function () { 
  $("[data-toggle='tooltip']").tooltip();
  $('.tab-content').hide();
  $('#myModal').modal({
		keyboard: false
  })
});
</script>
</head>
<body>
<?php if (!isset($_SESSION)) session_start(); ?>
<div id="auten">
<a type="button" class="btn btn-link" href="login_page.php?option=login">Войти</a>
<a type="button" class="btn btn-link" href="login_page.php?option=regist">Регистрация</a>
<a type="button" class="btn btn-link" id="unlogin">Выйти</a>
</div>
<div id="logo"></div>
<div id="wrapper1">
<div id="menu">
<input type="hidden" value = <?php if (isset($_COOKIE['id'])) echo $_COOKIE['id']?> />
<nav class="row">
   <ul class="nav nav-pills">
	   <li><a href="#" id="user_login" style="margin-left: -200px; text-transform:uppercase;"><?php if (isset($_COOKIE['user'])) echo $_COOKIE['user']; ?></a></li>
       <li><a href="#" class="menu_item" style="margin-left:10px;">Главная</a></li>
       <li><a href="#" class="menu_item">О сайте</a></li>
       <li><a href="#" class="menu_item"><span class="glyphicon glyphicon-book"></span> Моя библиотека</a></li>
	   <li>
		<div class="dropdown">
			<button class="btn btn-default dropdown-toggle" id="btnDownload"
			style="height: 45px;" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<span class="glyphicon glyphicon-download-alt"></span> Загрузить
			<span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
			<li id="download_curr_elem"></li>
			<li><a href="download_settings.php">Параметры загрузки</a></li>			
			</ul>
		</div>
		</li>
	   </ul>
</nav>
</div>
</div>
<div id="wrapper2">

<div id="nav_col" style="width: 230px;">
	<!--Vidgets' list -->
	<div class="btn-group-vertical" role="group" aria-label="..." style="width:100%;">
    <div class="btn-group" role="group">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-align:left; font-size: 18px;">
	   2D menu 
	  <span class="caret"></span>
	</button>
	<ul class="dropdown-menu" style="width: 100%;">
	  <li><a class="vidget">Example 1</a></li>
	  <li><a class="vidget">Example 2</a></li>
	</ul>
	</div>
	<button type="button" class="btn btn-default" style="text-align:left; font-size: 18px;">3D menu <span class="caret"></span></button>
	<button type="button" class="btn btn-default" style="text-align:left; font-size: 18px;">Panels <span class="caret"></span></button>
	</div>
	<!-- -->
</div>

<div id="settings_col">
<?php include 'usage_module.php'; ?>
</div>
<div id="view_col" >
<p class="center">Демонстрация виджета</p>
</div>

</div>
<div id="footer">
</div>
</body>
</html>