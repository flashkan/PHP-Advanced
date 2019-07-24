<?php

namespace App\controllers;

use App\models\Good;

class GoodController extends Controller
{
    public function goodAction()
    {
        $params = [
            'good' => Good::getOne($_GET['id'])
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
}