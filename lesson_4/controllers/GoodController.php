<?php

namespace App\controllers;

use App\models\Good;

class GoodController
{
    protected $defaultAction = 'goods';
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

    public function goodAction()
    {
        $id = $_GET['id'];
        $params = [
            'good' => Good::getOne($id)
        ];
        echo $this->render('good', $params);
    }

    public function goodsAction()
    {
        $params = [
            'goods' => Good::getAll()
        ];
        echo $this->render('goods', $params);
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