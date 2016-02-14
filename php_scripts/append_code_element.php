<?php
require_once 'login.php';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
$connection->set_charset("utf8");
if ($connection->connect_error) die("не удалось подключиться к базе данных");

if (isset($_GET['action']) && $_GET['action'] == 'getCode'){
	$elem_id = $_POST['elem_id'];
	$query = "select * from base_settings where vidget_id = '$elem_id'";
	$result = $connection->query($query);
	if (!$result) die($connection->error);
	$result->data_seek(0);
	echo  $result->fetch_assoc()['html_code'];	
}
if (isset($_GET['action']) && $_GET['action'] == 'getDemo'){
	$codes = array();
	$elem_id = $_POST['elem_id'];
	$html = file_get_contents('../demo_code/html/' . $elem_id . '.php');
	$js = file_get_contents('../demo_code/js/' . $elem_id . '.php');
	$css = file_get_contents('../demo_code/css/' . $elem_id . '.php');
	array_push($codes, array('html' => $html, 'js' => $js, 'css' => $css));
	echo json_encode(array("codes" => $codes));
}
$connection->close();
?>