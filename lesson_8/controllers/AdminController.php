<?php

namespace App\controllers;

use App\models\repositories\CartRepository;
use App\models\repositories\GoodRepository;
use App\models\repositories\OrderRepository;
use App\models\repositories\UserRepository;

class AdminController extends Controller
{
    public function adminAction()
    {
        $userAdmin = $this->request->getSession('userAdmin');
        if ($userAdmin != true) return;
        $this->params += [
            'currentUrl' => '/admin/admin',
            'users' => (new UserRepository)->getAll(),
            'goods' => (new GoodRepository())->getAll(),
            'cartGoods' => (new CartRepository())->getAll(),
            'orders' => (new OrderRepository())->getAll(),
        ];
        echo $this->render('admin', $this->params);
    }

    public function deleteUserAction()
    {
        $userAdmin = $this->request->getSession('userAdmin');
        if ($userAdmin != true) return;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['userId'];
            (new UserRepository)->delete($id);
            (new CartRepository)->delGoodsInCart($id);
            (new OrderRepository)->delOrders($id);
            return $this->redirect();
        }
        return $this->redirect();
    }

}