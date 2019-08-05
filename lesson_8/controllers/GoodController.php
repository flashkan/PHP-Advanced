<?php

namespace App\controllers;


use App\models\repositories\GoodRepository;

class GoodController extends Controller
{
    public function goodAction()
    {
        $id = $this->request->getId();
        $this->params += [
            'good' => (new GoodRepository())->getOne($id)
        ];
        echo $this->render('good', $this->params);
    }

    public function goodsAction()
    {
        $this->params += [
            'currentUrl' => '/good/goods',
            'goods' => (new GoodRepository())->getAll()
        ];
        echo $this->render('goods', $this->params);
    }

    public function mainPageAction()
    {
        $this->params += [
            'currentUrl' => '/good/mainPage'
        ];
        echo $this->render('mainPage', $this->params);
    }
}