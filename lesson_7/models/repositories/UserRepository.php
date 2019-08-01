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
}
