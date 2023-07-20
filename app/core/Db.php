<?php

namespace app\core;

class Db
{
    protected $db;

    public function __construct ()
    {
        $db_name = "app/config/db_config.php";
        if (file_exists($db_name)) {
            $db_config = require_once $db_name;
            try {

                $dsn = "mysql:dbname={$db_config['db_name']};host={$db_config['host']}";
                $this->db = new \PDO($dsn, $db_config['user'], $db_config['password']);
            } catch (\PDOException $error) {
                die("Ошибка подключение к БД");
            }
        }
    }

    // Здесь создаются методы для работы чисто с бд достать, редактировать, удалить;

    /**
     * Возвращает массив данных из db.
     *
     * @param string $table_name Из какой таблице выбирать.
     *
     * @return array Массив все выбранных данных в переданной таблице.
     */
    public function queryAll (string $table_name): array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$table_name}");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Возвращает массив данных по id.
     *
     * @param string $table_name Из какой таблице выбирать.
     * @param int $id по какому id выбирать.
     *
     * @return array Массив всеx выбранных данных в переданной таблице.
     */
    public function queryById (string $table_name, int $id): array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$table_name} WHERE `id` = {$id}");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Возвращает массив данных по указанным параметрам (login, password).
     *
     * @param string $table_name Из какой таблице выбирать.
     *
     * @param string $login
     * @param string $password
     *
     * По каким параметра будет выбиратся данные
     *
     * @return array
     */
    public function queryByLoginAndPassword (string $table_name, string $login, string $password): array
    {
        $stmt = $this->db->prepare("SELECT login, password FROM {$table_name} WHERE login = ? AND password = ?");
        $stmt->execute([$login, $password]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}