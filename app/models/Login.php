<?php

namespace app\models;

use  app\core\Model;

class Login extends Model
{
    private string $login;
    private string $password;
    public string $messageError = '';

    public function getLoginAndPassword($login, $password): void
    {
        $this->login = $this->clearString($login);
        $this->password = $this->clearString($password);

		$this->checkAuth();
    }

    private function authUser($result): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
		$_SESSION['auth_admin'] = 'yes_auth';
		header('Location: /main');
    }

    private function checkAuth()
	{
        if($this->login and $this->password)
		{
			$password = password_hash($this->password, PASSWORD_DEFAULT);

			$result = $this->db->queryByLoginAndPassword('reg_user', $this->login , $this->password);

			if ($result)
			{
				$this->authUser($result);
			}else{
				$this->messageError = 'Неверный Логин и/или Пароль';
			}
		}else{
			$this->messageError = 'Заполните все поля';
		}
    }

}