<?php	
	//сделать из этого класс
	require_once 'login.php';
	$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
	$connection->set_charset("utf8");
?>