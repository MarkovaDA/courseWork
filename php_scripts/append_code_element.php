<?php
require_once 'login.php';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
$connection->set_charset("utf8");
if ($connection->connect_error) die("не удалось подключиться к базе данных");

if (isset($_GET['action']) && $_GET['action'] == 'getCode'){
	if (!isset($_SESSION)) session_start();
	$elem_id = $_POST['elem_id'];
	$_SESSION['current'] = $elem_id;
	$query = "select * from base_settings where vidget_id = '$elem_id'";
	$result = $connection->query($query);
	if (!$result) die($connection->error);
	$result->data_seek(0);
	echo $result->fetch_assoc()['html_code'];
	
}
$connection->close();
?>