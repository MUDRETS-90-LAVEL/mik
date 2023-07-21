<?php

namespace app\controllers;

use app\core\Controller;
class EventController extends Controller
{
    public function indexAction()
    {
        defined('mik') or die('Доступ закрыт');
        $data = [];

        $_SESSION['urlpage'] = '<a href="/main">Главная</a>'.'/'.'<a href="event">События</a>';
        $this->view->render($data);
    }
}