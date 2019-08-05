<?php


namespace App\controllers;


use App\models\repositories\CartRepository;
use App\models\repositories\OrderRepository;
use App\models\repositories\UserRepository;

class OrderController extends Controller
{
    public function orderAction()
    {
        $userId = $this->request->getSession('userId');
        $user = (new UserRepository())->getOne($userId);
        $class = new CartRepository();
        $allGoods = $class->getAll();
        $goods = [];
        $totalQuantity = 0;
        $totalPrice = 0;
        foreach ($allGoods as $good)
        {
            if ($good->getUserId() == $userId) {
                $goods[] = $good;
                $totalQuantity += $good->getGoodQuantity();
                $totalPrice += $good->getGoodQuantity() * $good->getGoodPrice();
            };
        }

        $this->params += [
            'goods' => $goods,
            'user' => $user,
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice
        ];
        echo $this->render('order', $this->params);
    }

    public function ordersAction()
    {
        $userId = $this->request->getSession('userId');
        $allGoods = (new OrderRepository())->getAll();
        $goods = [];

        foreach ($allGoods as $good) {
            if ($good->getUserId() == $userId) {
                $goods[] = $good;
            };
        }
        $this->params += [
            'currentUrl' => '/order/orders',
            'orders' => $goods
        ];
        echo $this->render('orders', $this->params);
    }

    public function newOrderAction()
    {
        $userId = $this->request->getSession('userId');
        $user = (new UserRepository())->getOne($userId);
        $classCart = new CartRepository();
        $allGoods = $classCart->getAll();
        $goods = [];
        $totalPrice = 0;
        foreach ($allGoods as $good)
        {
            if ($good->getUserId() == $userId) {
                $goods[] = $good;
                $totalPrice += $good->getGoodQuantity() * $good->getGoodPrice();
            };
        }

        $goodsArray = [];
        foreach ($goods as $key => $good)
        {
            $goodsArray[$key]['id'] = $good->getId();
            $goodsArray[$key]['user_id'] = $good->getUserId();
            $goodsArray[$key]['good_price'] = $good->getGoodPrice();
            $goodsArray[$key]['good_quantity'] = $good->getGoodQuantity();
            $goodsArray[$key]['good_name'] = $good->getGoodName();
            $goodsArray[$key]['good_description'] = $good->getGoodDescription();
        }

        $jsonStrGoods = json_encode($goodsArray);

        $params = [
            'user_id' => $userId,
            'user_email' => $_POST['userEmail'],
            'user_phone' => $_POST['userPhone'],
            'user_address' => $_POST['orderAddress'],
            'total_price' => $totalPrice,
            'order_data' => date("d.m.Y G:i"),
            'order_status' => 'Обрабатывается',
            'order_json' => $jsonStrGoods
        ];
        $classCart->delGoodsInCart($userId);
        (new OrderRepository())->save($params);
        return $this->redirect('/order/orders');
    }
}