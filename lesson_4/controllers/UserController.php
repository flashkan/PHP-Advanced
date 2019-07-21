<?php

namespace App\controllers;

use App\models\User;

class UserController
{
    protected $defaultAction = 'users';
    protected $action;

    public function run($action)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = $this->action . 'Action';
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo 'Error 404';
        }
    }

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

    public function render($template, $params = [])
    {
        $content = $this->renderTemp($template, $params);
        return $this->renderTemp('layouts/main', [
            'content' => $content
        ]);
    }

    public function renderTemp($template, $params = [])
    {
        ob_start();
        extract($params);
        include $_SERVER['DOCUMENT_ROOT'] . '/../views/' . $template . '.php';
        return ob_get_clean();
    }
}