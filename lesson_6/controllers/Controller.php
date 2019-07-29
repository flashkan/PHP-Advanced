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

    public function __construct(IRenderServices $renderer, Request $request)
    {
        $this->render = $renderer;
        $this->request = $request;
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
        $content = $this->renderTemp($template, $params);
        return $this->renderTemp('layouts/main', [
            'content' => $content
        ]);
    }

    public function renderTemp($template, $params)
    {
        return $this->render->renderTemp($template, $params);
    }

}