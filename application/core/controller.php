<?php
class Controller
	{
	public $model;

	public $view;

	public $params;

	function __construct()
		{
		$this->view = new View();
		}

	function action_index()
		{
		}
	}
?>