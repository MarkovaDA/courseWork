<?php
class GettingVidgetInfo{
	private $con;
	function __construct($connection)
	{   
		$this->con = $connection;
	}
	function getHTMLCode($userId){
		$this->getCode($userId, "html_code");
	}
	function getCSSCode($userId){
		$this->getCode($userId, "css_code");
	}
	//получаем сохранённый код пользователя
	function getCode($userId,$whatCode){
		$query = "select " . $whatCode . " from vidgets_info where vidget_id = 1 and user_id = '$userId'";
		$result = $this->con->query($query);
		if (!$result) die($this->con->error);
		$rows = $result->num_rows;
		if ($result->num_rows > 0){
			$result->data_seek(0);
			echo $result->fetch_assoc()[$whatCode];
		}		
	}
}

?>