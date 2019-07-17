<?php

namespace App\models;

use \App\services\BD;
use \App\services\IBD;
use http\Params;

abstract class Model
{
    /**
     * @var BD Класс для работы с базой данных
     */
    protected $bd;

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
    abstract protected function getTableName();

    /**
     * Возращает запись с указанным id
     *
     * @param int $id ID Записи таблицы
     * @return array
     */
    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->bd->find($sql, [':id' => $id]);
    }

    /**
     * Получение всех записей таблицы
     * @return mixed
     */
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->bd->findAll($sql);
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
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET `name` = :userName, `login` = :userLogin, `pass` = :userPass WHERE `id` = :id;";
        $this->bd->execute($sql, [':userName' => $params['name'], ':userLogin' => $params['login'], ':userPass' => $params['pass'], ':id' => $id]);
    }

    /**
     * Создает новый элемент.
     * @param array $params Значения параметров.
     */
    private function insert($params)
    {
        $tableName = $this->getTableName();
        $sql = "INSERT INTO {$tableName} (`name`, `login`, `pass`) VALUE (:userName, :userLogin, :userPass);";
        $this->bd->execute($sql, [':userName' => $params['name'], ':userLogin' => $params['login'], ':userPass' => $params['pass']]);
    }

    /**
     * @param int $id Удаляет элемент по полученному id.
     */
    public function delete($id)
    {
        $tableName = $this->getTableName($id);
        $sql = "DELETE FROM {$tableName} WHERE `id` = :id;";
        $this->bd->execute($sql, [':id' => $id]);
    }

}