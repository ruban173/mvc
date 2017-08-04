<?php
class DataBase

	{
	public $host = "testjob.ru";

	public $user = "root";

	public $password = "";

	public $basename = "testjob";

	function __construct()
		{
		$link = mysql_connect($this->host, $this->user, $this->password);
		mysql_select_db($this->basename);
		}

	public 	function query($sql)
		{
		$result = mysql_query($sql);
		mysql_close();
		}

	public 	function queryResult($sql)
		{
		$result = mysql_query($sql);
		for ($data = array(); $row = mysql_fetch_assoc($result); $data[] = $row);
		mysql_close();
		return $data;
		}
	}

?>