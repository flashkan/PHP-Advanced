<?php

namespace App\models;
abstract class Model
{
    private $db;

    abstract function getTableName();

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function get($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE `user_id` = $id;";
        return $this->db->find($sql);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}`;";
        return $this->db->findAll($sql);
    }
}