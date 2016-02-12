<?php
require_once 'login.php';
require_once 'usefull-functions.php';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
$connection->set_charset("utf8");
if ($connection->connect_error) die("не удалось подключиться к базе данных");
if (isset($_POST['PHP_AUTH_USER']) && isset($_POST['PHP_AUTH_PW'])){
	$un_temp = mysql_entities_fix_string($connection,$_POST['PHP_AUTH_USER']);
	$pw_temp = mysql_entities_fix_string($connection,$_POST['PHP_AUTH_PW']);
	$query = "select * from users where user_login='$un_temp'";
	$result = $connection->query($query);
	if (!$result) die($connection->error);
	else if ($result->num_rows)
	{
		$row = $result->fetch_array(MYSQLI_NUM);
		$result->close();
		$salt1 = "qm&h*";
		$salt2 = "pg!@";
		$token = hash('ripemd128', "$salt1$pw_temp$salt2");
		if ($token == $row[2]) 
		{   
			setcookie('user',$un_temp,time()+3600*24*7,'/');
			setcookie('id',  $row[0],time()+3600*24*7, '/');
			header('Location: ../index.php', false); 
		}
		else die("Неверная комбинация имя пользователя-пароль");
	}
}
else
{
	header('WWW-Authenticate: Basic realm="Restricted Section"');
	header('HTTP/1.0 401 Unauthorized');
	die ("Пожалуйста, введите имя пользователя и пароль");
}
$connection->close();
?>