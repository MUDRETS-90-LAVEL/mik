<?php

namespace app\core;

class View
{
	public $title = '';
	public $description = '';
	public $keywords = '';
	public $layout = 'default';
	protected $route;
	protected $path;

	public function __construct ($route)
	{
		$this->route = $route;
		$this->path = $route['controller'] . '/' . $route['action'];
	}

	public function render ($data, $params = null)
	{
		$view = "app/views/{$this->path}.php";

		 extract($data);

		if (file_exists($view)) {
			ob_start();
			require_once $view;
			$content = ob_get_clean();
		}

		$layout = "app/views/layouts/{$this->layout}.php";
		if (file_exists($layout)) {
			require_once $layout;
		}
	}
}