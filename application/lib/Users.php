<?php
class Users

	{
	public $login;

	public $password;

	public 	function autorization($login, $password)
		{
		$obj = new DataBase();
		$sql = "select * from users where login='{$login}' and password='{$password}'";
		$user = $obj->queryResult($sql);
		$count = count($user);
		if ($count == 1)
			{
			setcookie('user', serialize($user) , time() + 3600);
			return true;
			}
		  else return false;
		}

	static public function userData()
		{
		$obj = unserialize($_COOKIE['user']);
		return $obj[0];
		}

	public 	function userExit()
		{
		setcookie("user", null, -1, '/');
		}
	}

?>