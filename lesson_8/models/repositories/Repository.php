<?php

namespace App\models\repositories;

use App\main\App;

abstract class Repository
{
    /**
     * @var
     */
    protected $bd;

    /**
     * Repository constructor.
     */
    public function __construct()
    {
        $this->bd = App::call()->bd;
    }

    /**
     * Данный метод должен вернуть название таблицы
     * @return string
     */
    abstract protected function getTableName();

    abstract protected function getColumnNames();

    abstract protected function getEntityName();

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
        return $this->bd->queryObject($sql, $this->getEntityName(), [':id' => $id]);
    }

    /**
     * Получение всех записей таблицы
     * @return mixed
     */
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->bd->queryObjects($sql, $this->getEntityName());
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
        $columnNames = $this->getColumnNames();
        $resultParams = array_combine($columnNames, $params);
        $tableName = $this->getTableName();
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
        $columnNames = $this->getColumnNames();
        $resultParams = array_combine($columnNames, $params);
        $tableName = $this->getTableName();
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
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE `id` = :id;";
        $this->bd->execute($sql, [':id' => $id]);
    }
}