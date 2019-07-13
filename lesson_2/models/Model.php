<?php

namespace App\models;
use App\services\DB;
abstract class Model
{
    /**
     * @var DB $db хранит в себе класс с базой данных.
     */
    private $db;

    // есть вопрос по следующей докоментации, в вашей интерпретации $db значится как IDB (интфейс). Почему?
    // Разве создается не от DB?
    /**
     * Model constructor.
     * При создании нового класса передает его в пременную $db класса Model.
     * @param DB $db Новый класс.
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Возвращает стоку с названием таблицы из базы данных.
     * @return string Название таблицы.
     */
    abstract function getTableName();

    /**
     * Получает id необходимого элемента. Формирует и отравляет запрос в БД.
     * @param int $id Id элемента.
     * @return string Готовый SQL запрос.
     */
    public function get($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE `user_id` = $id;";
        return $this->db->find($sql);
    }

    /**
     * Формирует и отравляет запрос в БД.
     * @return string Готовый SQL запрос.
     */
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}`;";
        return $this->db->findAll($sql);
    }
}
