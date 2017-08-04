<?php
class Controller_Autorization extends Controller

	{
	function action_index()
		{
		if (isset($_POST['autorization']))
			{
			if (Users::autorization($_POST['login'], $_POST['password']) != false) $this->view->redirect('/');
			}

		$this->view->render('Autorization_View.php', 'main_template.php');
		}

	function action_exit()
		{
		Users::userExit();
		$this->view->redirect('/');
		}
	}

?>