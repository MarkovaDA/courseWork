<?php

class UpdatingVidgetInfo{
	private $con;

	function __construct($connection)
	{   
		$this->con = $connection;
	}
	function sentHTMLCode($userId, $newHTMLCode){
		$this->sentCode($userId, $newHTMLCode, "html_code");
	}
	function sentCSSCode($userId, $newCSSCode){
		$this->sentCode($userId, $newCSSCode, "css_code");
	}
    function sentCode($userId, $newCode, $whatCode){
		$query = "select * from vidgets_info where user_id='$userId'";
		$result = $this->con->query($query);
		if ($rows = $result->num_rows == 1) 
		{
			$query = "update vidgets_info set " . $whatCode . " = '$newCode' where vidget_id = 1 and user_id ='$userId'";
			$result = $this->con->query($query);
			if (!$result) die($this->con->error);
		}
		else 
		{
			$query = "insert into vidgets_info (vidget_id, vidget_name," . $whatCode . ", user_id) values (1, 'SimpleDroppingMenu', '$newCode','$userId')";
			$result = $this->con->query($query);
			if (!$result) die($this->con->error);
	    }
	}
}
?>