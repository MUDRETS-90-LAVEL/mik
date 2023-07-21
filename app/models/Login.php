<?php

namespace app\models;

use  app\core\Model;

class Login extends Model
{
    /**
     * @var string
     *
     * Создаем сойство
     */
    private string $login;
    /**
     * @var string
     *
     * Создаем свойство
     */
    private string $password;
    /**
     * @var string
     *
     * Создаем свойство
     *
     */
    public string $messageError = '';

    /**
     * @param $login
     * @param $password
     *
     * Получаем данные очищяем и вызываем метод проверки
     *
     * @return void
     */
    public function getLoginAndPassword($login, $password): void
    {
        $this->login = $this->clearString($login);
        $this->password = $this->clearString($password);

		$this->checkAuth();
    }

    /**
     * @param $result
     *
     * Принимаем данные проверяе ссесию авторизуем пользователя
     *
     * @return void
     */
    private function authUser($result): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
		$_SESSION['auth_admin'] = 'yes_auth';
		header('Location: /main');
    }

    /**
     *
     * Если логин и пароль не пустые то хешируем пароль и вызываем метод авторизации пользователя
     * Если записываем ошибку в поля
     *
     * @return void
     */
    private function checkAuth():void
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