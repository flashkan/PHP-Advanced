<?php

namespace App\models\repositories;

use App\models\entities\User;

class UserRepository extends Repository
{
    public function getColumnNames()
    {
        return $columnNames = ['user_name', 'user_login', 'user_phone', 'user_pass', 'user_email', 'user_admin'];
    }

    public function getTableName()
    {
        return 'users';
    }

    protected function getEntityName()
    {
        return User::class;
    }

    public function updateNewPassword($params, $id)
    {
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET `user_pass` = $params WHERE `id` = :id;";
        $array = [':id' => $id];
        $this->bd->execute($sql, $array);
    }

    public function updateUserInfo($params, $id)
    {
        $columnNames = $this->getColumnNames();
        $newColumnNames = [];
        foreach ($columnNames as $name) {
            if ($name == 'user_pass') {
                continue;
            }
            if ($name == 'user_admin') {
                continue;
            }
            $newColumnNames[] = $name;
        }

        $resultParams = array_combine($newColumnNames, $params);
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
}
