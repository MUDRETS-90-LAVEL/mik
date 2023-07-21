<?php

namespace app\models;

use app\core\Model;
class Trial extends Model
{
    /**
     *
     * Получает все записи из указанной таблицы в бд
     * и возвращяет масив данных
     *
     * @return array
     */
    public function getData(): array
    {
       return $this->db->queryAll('table_trials');
    }

    /**
     * @param array $result
     *
     * Принимает масив данных отчищяет каждое поле
     * и передает методу очищенные поля
     *
     * @return void
     */
    public function getTrial(array $result):void
    {
        $trial_text = $this->clearString($result['type_trial']);
        $floar = $this->clearString($result['floar']);
        $age = $this->clearString($result['age']);
        $priority = $this->clearString($result['priority']);

        $this->creatTrial($trial_text, $floar, $age, $priority);
    }

    /**
     * @param $id
     *
     * Удаляет запись в бд по указанному id
     *
     * @return void
     */
    public function deleti_row($id):void
    {
        $this->db->queryDeletiId('table_trials', $id);
    }

    /**
     * @param string $trial_text
     * @param string $floar
     * @param int $age
     * @param int $priority
     *
     * Добовляет запись в базу данных
     *
     * @return void
     */
    private function creatTrial(string $trial_text, string $floar, int $age, int $priority):void
    {
        $this->db->queryAddTrial('table_trials', $trial_text, $floar, $age, $priority);
    }
}