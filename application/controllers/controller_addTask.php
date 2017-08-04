<?php
class Controller_AddTask extends Controller
	{
	function __construct()
		{
		$this->model = new Model_Tasks();
		$this->view = new View();
		}

	function action_index()
		{
		if (isset($_POST['add']))
			{
			$model = $this->model->loading();
			if ($this->model->imageValidation($this->model->image['type']))
				{
				$type = explode('.', $model->image['name']);
				$img = MD5(rand(0, 999999999999)) . '.' . $type[1];
				move_uploaded_file($this->model->image["tmp_name"], 'application\images\\' . $img);
				$this->model->resizeImage('application\images\\' . $img);
				}

			$this->model->insert($model, $img);
			$this->view->redirect('/');
			}

		$this->view->render('AddTask_View.php', 'main_template.php', $model);
		}
	}

?>
