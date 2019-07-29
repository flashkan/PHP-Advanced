<?php

namespace App\controllers;


use App\models\repositories\GoodRepository;

class GoodController extends Controller
{
    public function goodAction()
    {
        $id = $this->request->getId();
        $params = [
            'good' => (new GoodRepository())->getOne($id)
        ];
        echo $this->render('good', $params);
    }

    public function goodsAction()
    {
        $params = [
            'goods' => (new GoodRepository())->getAll()
        ];
        echo $this->render('goods', $params);
    }
}