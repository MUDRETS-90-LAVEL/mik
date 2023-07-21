<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Trial;
class TrialController extends Controller
{
    public function indexAction ()
    {
        defined('mik') or die('Доступ закрыт');
        $data = [];

        $model = new Trial;
        $data = $model->getData();

        if (isset($_POST['addTrial'])){

            $result = $this->isChekData($_POST['type_trial'],$_POST['floar'], $_POST['age'], $_POST['number']);
            $model->getTrial($result);
        }

        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $model->deleti_row($id);
        }

        $_SESSION['urlpage'] = '<a href="/main">Главная</a>'.'/'.'<a href="trial">Испытания</a>';
        $this->view->render($data);
    }

    /**
     * @param $type_trial
     * @param $floar
     * @param $age
     * @param $priority
     *
     * Принимает параметры
     * Проверяет параметры и возвращяет либо массив либо ошибку
     *
     * @return array|string
     */
    private function isChekData($type_trial, $floar, $age, $priority)
    {
        $dataResult = [];

        if (isset($type_trial) && isset($floar) && isset($age) && isset($priority))
        {
            $dataResult['type_trial'] = $type_trial;
            $dataResult['floar'] = $floar;
            $dataResult['age'] = $age;
            $dataResult['priority'] = $priority;

            return $dataResult;
        }else{
            return 'Вы ввели не все данные';
        }
    }
}