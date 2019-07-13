<?php

namespace App\models;
class Users extends Model
{
    protected $id;
    protected $name;
    protected $login;
    protected $password;
    protected $email;
    protected $isAdmin;

    /**
     * Возвращает стоку с названием таблицы из базы данных.
     * @return string Название таблицы.
     */
    public function getTableName()
    {
        return 'users';
    }
}