<?php

namespace app\core;

class Router
{
	private $route = [];
	private $params = [];

	public function __construct ()
	{
		$routes_arr = require_once "app/config/routes.php";
		foreach ($routes_arr as $route => $param) {
			$this->add($route, $param);
		}
	}

	private function add ($route, $param)
	{
		$route = "#^" . "$route" . "$#";
		$this->route[$route] = $param;
	}

	public function run ()
	{
		if ($this->match()) {
			$controller_name = 'app\controllers\\' . ucfirst($this->params['controller']) . 'Controller';

			//Делаем проверку на существование нашего Контроллера
			if (class_exists($controller_name)) {
				$controller = new $controller_name($this->params);
				$action_name = $this->params['action'] . "Action";

				//Делаем проверку существует ли метод или нет
				if (method_exists($controller, $action_name)) {
					$controller->$action_name();
				} else {
					//Выдаем ошибку что нет такого метода
					echo "Метод не существует: {$action_name}";
				}
			} else {
				//Выдает ошибку контроллер не найден
				echo "Контроллер не найден: {$controller_name}";
			}
		}
	}

	private function match ()
	{
		$url = trim($_SERVER['REQUEST_URI'], "/");

		$url = $this->removeQueryString($url);

		foreach ($this->route as $route => $params) {
			if (preg_match($route, $url, $matches)) {
				$this->params = $params;
				return true;
			}
		}
//        header('Location: 404');
		return false;
	}

	private function removeQueryString (string $url)
	{
		$params = explode("?", $url);
		return $params[0];
	}
}