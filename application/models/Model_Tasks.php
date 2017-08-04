<?php
class Model_Tasks extends Model

	{
	public $id;

	public $user;

	public $email;

	public $text;

	public $image;

	public $date_create;

	public $status;

	public

	function __construct()
		{
		}

	public 	function insert($model, $img)
		{
		$insert = new DataBase();
		$sql = "INSERT INTO tasks( user, email,text, image) VALUES ('{$model->user}','{$model->email}','{$model->text}','{$img}')";
		$insert->query($sql);
		}

	public 	function update($model)
		{
		$update = new DataBase();
		$sql = "UPDATE tasks SET  user='{$model->user}', email='{$model->email}',text='{$model->text}',image='{$model->image}' Where id=" . $model->id;
		$update->query($sql);
		}

	public 	function select($where = null)
		{
		$select = new DataBase();
		$sql = "select * from tasks " . $where . " LIMIT 3";
		return $select->queryResult($sql);
		}

	public 	function selectParam($param = null)
		{
		$select = new DataBase();
		$sql = "select * from tasks " . $param;
		return $select->queryResult($sql);
		}

	public 	function count()
		{
		$select = new DataBase();
		$sql = "select count(*) as count from tasks ";
		$count = $select->queryResult($sql);
		return $count[0]['count'];
		}

	public 	function loading()
		{
		if (isset($_POST['add']))
			{
			$this->user = $_POST['user'];
			$this->email = $_POST['email'];
			$this->text = $_POST['text'];
			$this->image = $_FILES['image'];
			return $this;
			}
		  else
			{
			return false;
			}
		}

	public 	function updateStatus($status, $id)
		{
		$update = new DataBase();
		$sql = "UPDATE tasks SET  status={$status} Where id=" . $id;
		$update->query($sql);
		}

	public 	function imageValidation($type)
		{
		if ($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif') return true;
		  else return false;
		}

	public 	function resizeImage($filename)
		{
		$image = new SimpleImage();
		$image->load($filename);
		if ($image->getWidth() > 320 && $image->getHeight() > 240)
			{
			$image->resize(320, 240);
			}
		elseif ($image->getWidth() > 320)
			{
			$image->resizeToWidth(320);
			}
		elseif ($image->getHeight() > 240)
			{
			$image->resizeToHeight(240);
			}

		$image->save($filename);
		}

	public 	function get_data()
		{
		return self::$this;
		}
	}
    ?>