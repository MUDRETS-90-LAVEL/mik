<?php

namespace app\core;

abstract class Controller
{
	protected $router;
	protected $view;

	public function __construct ($router)
	{
		$this->router = $router;
		$this->view = new View($router);
	}
}