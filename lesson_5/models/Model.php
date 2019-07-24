<?php

namespace App\models;

use \App\services\BD;
abstract class Model
{
    /**
     * @var BD Класс для работы с базой данных
     */
    protected $bd;
    protected $save;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->bd = BD::getInstance();
    }

    /**
     * Данный метод должен вернуть название таблицы
     * @return string
     */
    abstract protected static function getTableName();

    abstract protected static function getColumnNames();

    /**
     * Возращает запись с указанным id
     *
     * @param int $id ID Записи таблицы
     * @return array
     */
    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return BD::getInstance()->queryObject($sql, get_called_class(), [':id' => $id]);
    }

    /**
     * Получение всех записей таблицы
     * @return mixed
     */
    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return BD::getInstance()->queryObjects($sql, get_called_class());
    }

    /**
     * Если получает id, переопределяет существующие значения. В противном случае создает новый элемент.
     * @param array $params Значения параметров.
     * @param null|int $id Id элемента.
     */
    public function save($params = [], $id = null)
    {
        if ($id) {
            $this->update($params, $id);
        } else {
            $this->insert($params);
        }
    }

    /**
     * Переопределяет существующие значения по соответственному id.
     * @param array $params Значения параметров.
     * @param int $id Id элемента.
     */
    private function update($params, $id)
    {
        $columnNames = static::getColumnNames();
        $resultParams = array_combine($columnNames, $params);
        $tableName = static::getTableName();
        $sql = "UPDATE {$tableName} SET ";
        $array = [':id' => $id];
        foreach ($resultParams as $key => $value) {
            $nameKey = ":{$key}";
            if (end($resultParams) === $value) {
                $sql .= "`$key` = $nameKey WHERE `id` = :id;";
                $array[$nameKey] = $value;
            } else {
                $sql .= "`$key` = $nameKey, ";
                $array[$nameKey] = $value;
            }
        }
        $this->bd->execute($sql, $array);
    }

    /**
     * Создает новый элемент.
     * @param array $params Значения параметров.
     */
    private function insert($params)
    {
        $columnNames = static::getColumnNames();
        $resultParams = array_combine($columnNames, $params);
        $tableName = static::getTableName();
        $sql = "INSERT INTO {$tableName} (";
        $sqlValue = 'VALUE (';
        $array = [];

        foreach ($resultParams as $key => $value) {
            $nameKey = ":{$tableName}_{$key}";
            if (end($resultParams) === $value) {
                $sql .= "`$key`) ";
                $sqlValue .= "$nameKey);";
                $array[$nameKey] = $value;
            } else {
                $sql .= "`$key`, ";
                $sqlValue .= "$nameKey, ";
                $array[$nameKey] = $value;
            }
        }
        $sql .= $sqlValue;
        $this->bd->execute($sql, $array);
    }

    /**
     * @param int $id Удаляет элемент по полученному id.
     */
    public function delete($id)
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE `id` = :id;";
        $this->bd->execute($sql, [':id' => $id]);
    }
}