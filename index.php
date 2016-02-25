<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link   rel = "stylesheet"  href = "css/bootstrap.min.css">
<link   rel = "stylesheet"  href = "css/main-style.css">
<script src = "js/jquery-1.11.3.min.js"></script>
<script src = "js/bootstrap.min.js"></script>
<script src = "js/Unlogin-script.js"></script>
<script src = "js/AppendElementContent.js"></script>

<link type="text/css" rel="stylesheet" href="syntaxhighlighter/styles/shCoreEclipse.css" />
<link type="text/css" rel="stylesheet" href="syntaxhighlighter/styles/shThemeEclipse.css" />

<script src = "js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="syntaxhighlighter/scripts/shCore.js"></script>
<script type="text/javascript" src="syntaxhighlighter/scripts/shBrushPhp.js"></script>
<script type="text/javascript" src="syntaxhighlighter/scripts/shBrushCss.js"></script>
<script type="text/javascript" src="syntaxhighlighter/scripts/shBrushJScript.js"></script>
<script type="text/javascript" src="syntaxhighlighter/scripts/shBrushXml.js"></script>
	
<meta   charset = "utf-8">
<title>Dynamic Vidgets Library</title>
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
<input type="hidden" id= "user_id" value = <?php if (isset($_COOKIE['id'])) echo $_COOKIE['id']?> />
<a id="user_login"><?php if (isset($_COOKIE['user'])) echo $_COOKIE['user']; ?></a>
<nav class="row">
   <ul class="nav nav-pills">
       <li><a href="#" class="menu_item" >Главная</a></li>
       <li><a href="#" class="menu_item">О сайте</a></li>
	   <?php if (isset($_COOKIE['id'])) 
       echo '<li><a href="#" class="menu_item"><span class="glyphicon glyphicon-book"></span> Моя библиотека</a></li>'
	   ?>
	   <li>
		<div class="dropdown">
			<button class="btn btn-default dropdown-toggle" id="btnDownload"
			style="height: 45px;" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<span class="glyphicon glyphicon-download-alt"></span> Загрузить
			<span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
				<li id="download_curr_elem" ></li>
				<li ><a href="download_module.php">Параметры загрузки</a></li>	
			</ul>
		</div>
		</li>
     
   </ul>
</nav>
</div>
</div>
<div id="wrapper2">
<div id="nav_col" style="width: 200px;">
	<p class="center-selection">Каталог</p>
	<!--Vidgets' list -->
	<div class="btn-group-vertical" role="group" aria-label="..." style="width:100%;">
    <div class="btn-group" role="group">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-align:left; font-size: 18px;">
	   2D menu 
	  <span class="caret"></span>
	</button>
		<ul class="dropdown-menu">
		  <li><a class="vidget" id="0">SimpleDroppingMenu</a></li>
		  <li><a class="vidget" id="1">InlineRollingMenu</a></li>
		  <li><a class="vidget" id="2">VerticalHierarchicalMenu</a></li>
		  <li><a class="vidget" id="5">InlineSlidingMenu</a></li>
		  <!--<li><a class="vidget" id="3">Compact2DMenu</a></li>-->
		</ul>
	</div>
	
	<div class="btn-group" role="group">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-align:left; font-size: 18px;">3D menu <span class="caret"></span></button>
		<ul class="dropdown-menu">
			<li><a class="vidget" id="4">InlineButtonMenu</a></li>
		</ul>
	</div>
	<button type="button" class="btn btn-default" style="text-align:left; font-size: 18px;">Panels <span class="caret"></span></button>
	</div>
</div>

<div id = "settings_col">
		
 <p class="center-selection">Внедрение виджета</p>
 <ul class="nav nav-tabs" style="float:center;">
      <li><a  data-toggle="tab" class="active" href="#tab1">html</a></li>
      <li><a  data-toggle="tab" href="#tab2">js</a></li>
      <li><a  data-toggle="tab" href="#tab3">css</a></li>
 </ul>
 <div class="tab-content" style="float:right;">
	<div id="tab1" class="tab-pane fade in active">
	</div>
	<div id="tab2" class="tab-pane fade">
	</div>
	<div id="tab3" class="tab-pane fade">
	</div>
 </div>
</div>
<div id ="view_col">
	<p class="center-selection">Демонстрация виджета</p>
	<div id="for_btn" style="width:100%;">
	</div>
	<div id="for_elem">
	</div>
</div>

</div>
<div id="footer">
</div>
<!--эти скрипты подгружать динамически-->
<script src = "uploads/Inline2DMenu.js"></script>
<script src = "uploads/VerticalHierarchicalMenu.js"></script>
<script src = "uploads/Compact2DMenu.js"></script>
<script src = "uploads/InlineButton3DMenu.js"></script>
<script src = "uploads/InlineSliding2DMenu.js"></script>
</body>
</html>