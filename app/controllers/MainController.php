<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Main;

class MainController extends Controller
{
    public function indexAction ()
    {
		session_start();
		if (isset($_SESSION['auth_admin']) == 'yes_auth'){

			defined('mik') or die('Доступ закрыт');

		$data = [];
			if (isset($_GET['logout']))
			{
				unset($_SESSION['auth_admin']);
				header('Location: /');
			}

			$_SESSION['urlpage'] = '<a href="/main">Главная</a>';
			$this->view->render($data);
		}
    }
}