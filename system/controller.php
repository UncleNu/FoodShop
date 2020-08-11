<?php
class Controller {
	public function loadModel($name)
	{
		require(APP_DIR .'models/'. strtolower($name) .'.php');

		$model = new $name;
		return $model;
	}

	public function mainclass()
	{
		require(APP_DIR .'models/mainclass.php');

		$model = new mainclass;
		return $model;
	}

	public function incModel($name)
	{
		require(APP_DIR .'models/'. strtolower($name) .'.php');
	}

	public function incPlugin($name)
	{
		require(APP_DIR .'plugins/'. strtolower($name) .'.php');
	}

	public function loadView($name)
	{
		$view = new View($name);
		return $view;
	}

	public function loadPlugin($name)
	{
		require(APP_DIR .'plugins/'. strtolower($name) .'.php');
	}

	public function loadHelper($name)
	{
		require(APP_DIR .'helpers/'. strtolower($name) .'.php');
		$helper = new $name;
		return $helper;
	}

	public function redirect($loc,$out='0')
	{
		if($out == '0'){
			global $config;
			header('Location: '. $config['base_url'] . $loc);
		}else{
			header('Location: '.$loc);
		}
	}

}

?>