<?php


namespace App\controllers;

use App\services\renders\IRenderServices;
use App\services\Request;

abstract class Controller
{
    protected $defaultAction = 'goods';
    protected $action;
    protected $render;
    protected $request;
    protected $params;

    public function __construct(IRenderServices $renderer, Request $request)
    {
        $this->request = $request;
        $this->render = $renderer;
        $this->params = $this->userInit();
    }

    protected function userInit()
    {
        if ($this->request->getSession('auth')) {
            $userId = $this->request->getSession('userId');
            $userLog = $this->request->getSession('userLog');
            return ['userId' => $userId, 'userLog' => $userLog];
        }
        return [];
    }

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



    public function render($template, $params = [])
    {
        return $this->render->renderTemp($template, $params);
    }

    protected function redirect($path = '')
    {
        if (empty($path)) {
            $path = $_SERVER['HTTP_REFERER'];
        }
        return header('Location:' . $path);
    }
}