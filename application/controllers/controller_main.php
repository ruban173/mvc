
<?php
class Controller_Main extends Controller

	{
	function action_index()
		{
		$model = new Model_Tasks();
		$param = explode('=', $this->params);
		if ($param[0] == 'sort_name')
			{
			switch ($param[1])
				{
			case 'up':
				$model = $model->select('ORDER BY user ASC');
				break;

			case 'down':
				$model = $model->select('ORDER BY user DESC');
				break;
				}
			}
		elseif ($param[0] == 'sort_email')
			{
			switch ($param[1])
				{
			case 'up':
				$model = $model->select('ORDER BY email ASC');
				break;

			case 'down':
				$model = $model->select('ORDER BY email DESC');
				break;
				}
			}
		elseif ($param[0] == 'sort_status')
			{
			switch ($param[1])
				{
			case 'yes':
				$model = $model->select("WHERE status=1");
				break;

			case 'no':
				$model = $model->select("WHERE status=0");
				break;
				}
			}
		elseif ($param[0] == 'pag')
			{
			$start = $param[1] * 3 - 3;
			$model = $model->selectParam("LIMIT {$start},3");
			}
		  else
			{
			$model = $model->select();
			}

		$this->view->render('main_view.php', 'main_template.php', $model);
		}

	function action_update()
		{
		$param = explode('=', $this->params);
		if ($param[0] == 'id')
			{
			$id = $param[1];
			$model = new Model_Tasks();
			if ($model->loading())
				{
				$model->id = $id;
				$img = $model->select('where id=' . $id);
				if ($img[0]['image'] == '')
					{
					$type = explode('.', $model->image['name']);
					$imgName = MD5(rand(0, 999999999999)) . '.' . $type[1];
					}
				  else
					{
					$imgName = $img[0]['image'];
					};
				move_uploaded_file($model->image["tmp_name"], 'application\images\\' . $imgName);
				$model->image = $imgName;
				$model->update($model);
				$this->view->redirect('/main');
				};
			$result = $model->select('where id=' . $id);
			$model = $result[0];
			$this->view->render('UpdateTask_View.php', 'main_template.php', $model);
			}
		  else $this->view->redirect('/');
		}

	function action_updateStatus()
		{
		if (isset($_POST['checkbox']))
			{
			$params = explode('_', $_POST['checkbox']);
			$model = new Model_Tasks();
			$model->updateStatus($params[0], $params[1]);
			echo "статус изменен!";
			}
		}
	}
?>
