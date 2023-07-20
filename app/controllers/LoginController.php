<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Login;

class LoginController extends Controller
{
	public function indexAction ()
	{
		defined('mik') or die('Доступ закрыт');
        $data = [];

        if(isset($_POST['submit']))
        {
            $login = $_POST['input_login'];
            $password = $_POST['input_password'];

            $model = new Login;

            $model->getLoginAndPassword($login, $password);

            $data['messageError'] = $model->messageError;
        }

		$this->view->render($data);
	}
}