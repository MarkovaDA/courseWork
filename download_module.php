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
<title>Download Settings</title>
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
<input type="hidden" value = <?php if (isset($_COOKIE['id'])) echo $_COOKIE['id']; ?> >
<a  id="user_login"><?php if (isset($_COOKIE['user'])) echo $_COOKIE['user']; ?></a>
<nav class="row" style="width:400px;">
   <ul class="nav nav-pills">
       <li><a href="index.php" class="menu_item">Главная</a></li>
       <li><a href="#" class="menu_item">О сайте</a></li>
       <li><a href="#" class="menu_item"><span class="glyphicon glyphicon-book"></span> Моя библиотека</a></li>
   </ul>
</nav>
</div>
</div>
<div id="wrapper2" style="background: white;">
	<form name="zips" method="post" action="generate_zip.php">
	<p class="center-selection">Параметры загрузки</p>
	<div class="block">
		<p class="center">2D menu</p>
		<div class="category">
		<label>
		<input type="checkbox" name="files[]" value="Simple2DDroppingMenu">SimpleDroppingMenu
		</label><br>
		<label>
		<input type="checkbox" name="files[]" value="Inline2DMenu">InlineMenu
		</label><br>
		<label>
		<input type="checkbox" name="files[]" value= "VerticalHierarchicalMenu">VerticalHierarchicalMenu
		</label>
		<br>
		</div>
	</div>
	
	<div class="block">
		<p class="center">3D menu</p>
		<div class="category"></div>
	</div>
	
	<div class="block">
		<p class="center">Panels</p>
		<div class="category"></div>
	</div>
	<div class="block">
		<p class="center">Dropdown</p>
		<div class="category"></div>
	</div>
	
	<div class="block">
		<p class="center">Tabs</p>
		<div class="category"></div>
	</div>
	
	<div class="block">
		<p class="center">Buttons</p>
		<div class="category"></div>
	</div>
	<div style="width: 100%; clear:both;">
	<button type="submit" class="btn btn-default" name="download" style="float:right; margin-bottom: 10px; margin-right: 10px; font-size:18px;">загрузить</button>
	</div>
	</form>
</div>
<div id="footer">
</div>
</body>
</html>

