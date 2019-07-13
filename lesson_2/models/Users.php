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

    public function getTableName()
    {
        return 'users';
    }
}