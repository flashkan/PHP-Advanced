<?php

namespace App\controllers;

use App\models\User;

class UserController extends Controller
{
    public function userAction()
    {
        $params = [
            'user' => User::getOne(3)
        ];
        echo $this->render('user', $params);
    }

    public function usersAction()
    {
        $params = [
            'users' => User::getAll()
        ];
        echo $this->render('users', $params);
    }
}