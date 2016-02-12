<!DOCTYPE html>
<html>
<head>
<script src = "js/jquery-1.11.3.min.js"></script>
<script src = "js/ConfirmPassword-script.js"></script>
<link   rel = "stylesheet"  href = "css/bootstrap.min.css">

<?php

if ($_GET['option'] == 'login')  {$handler = 'php_scripts/authenticate.php'; $title='Aутентификация'; $btn_text = "войти";}
if ($_GET['option'] == 'regist') {$handler = 'php_scripts/registration.php'; $title='Регистрация'; $btn_text = "регистрация";}

if ($_GET['option'] != 'regist' && $_GET['option'] != 'login') 
{
	header('Location: php_scripts/error.php', false); 
}
?>
<title><?php echo $title; ?></title>
<link   rel = "stylesheet"  href = "css/bootstrap.min.css">
<link   rel = "stylesheet"  href = "css/login-style.css">
</head>
<body>
<div id="logo"></div>
<div id="wrapper">
<div id="log_in">
<br> 
<p align = "center"><?php echo $title; ?></p>
<form method="post"  action=  <?php echo $handler ?> style="margin-left:500px; width: 500px;">
<input type="text" 	   placeholder="логин" name="PHP_AUTH_USER" required><br>
<input type="password" placeholder="пароль" name="PHP_AUTH_PW" required></input><br>
<button type="submit"  class="btn btn-default"><?php echo $btn_text; ?>
</button>
</form>
</div>
</div>
<div id="footer">
</div>
</body>
</html>