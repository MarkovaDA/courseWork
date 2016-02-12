<?php
require_once 'login.php';
require_once 'usefull-functions.php';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
$connection->set_charset("utf8");
if ($connection->connect_error) die("не удалось подключиться к базе данных");
if (isset($_POST['PHP_AUTH_USER']) && isset($_POST['PHP_AUTH_PW'])){
	$un_temp = mysql_entities_fix_string($connection,$_POST['PHP_AUTH_USER']);
	$pw_temp = mysql_entities_fix_string($connection,$_POST['PHP_AUTH_PW']);
	$salt1 = "qm&h*";
	$salt2 = "pg!@";
	
	$hashed_pw = hash('ripemd128', "$salt1$pw_temp$salt2");
	$query = "insert into users (user_login, user_password) values ('$un_temp','$hashed_pw')";
	$result = $connection->query($query);
	$query = "select * from users where user_login='$un_temp'";
	$result = $connection->query($query);
	$row = $result->fetch_array(MYSQLI_NUM);
	$result->close();
	setcookie('user',$un_temp, time()+3600*24*7, '/');
	setcookie('id',$row[0], time()+3600*24*7, '/');
	header('Location: ../index.php', false);
}

?>