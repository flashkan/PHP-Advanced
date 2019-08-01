<?php


namespace App\controllers;


use App\models\repositories\CartRepository;
use App\models\repositories\GoodRepository;

class CartController extends Controller
{
    public function goodAction()
    {
        $id = $this->request->getId();
        $this->params += [
            'good' => (new CartRepository())->getOne($id)
        ];
        echo $this->render('cartGood', $this->params);
    }

    public function goodsAction()
    {
        $userId = $this->request->getSession('userId');
        $allGoods = (new CartRepository())->getAll();
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
            'currentUrl' => '/cart/goods',
            'goods' => $goods,
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice,
        ];
        echo $this->render('cartGoods', $this->params);
    }

    public function addAction()
    {
        $userId = $this->request->getSession('userId');
        $goodId = $this->request->getId();
        $newGood = new CartRepository();
        $goodsAll = $newGood->getAll();
        foreach ($goodsAll as $item) {
            if ($item->getUserId() == $userId && $item->getId() == $goodId) {
                $params = [
                    'goodId' => $goodId,
                    'userId' => $userId,
                    'goodPrice' => $item->getGoodPrice(),
                    'goodQuantity' => $item->getGoodQuantity() + 1,
                    'goodName' => $item->getGoodName(),
                    'goodDescription' => $item->getGoodDescription()
                ];
                $newGood->save($params, $goodId);
                return $this->redirect('/good');
            }
        }

        $good = (new GoodRepository)->getOne($goodId);
        $params = [
            'id' => $goodId,
            'userId' => $userId,
            'goodPrice' => $good->getGoodPrice(),
            'goodQuantity' => 1,
            'goodName' => $good->getGoodName(),
            'goodDescription' => $good->getGoodDescription()
        ];
        $newGood->save($params);
        return $this->redirect('/good');
    }

    public function delAction()
    {
        $userId = 4;
        $id = $this->request->getId();
        $newGood = new CartRepository();
        $good = $newGood->getOne($id);
        if ($good->getGoodQuantity() == 1) {
            $newGood->delete($id);
            return $this->redirect('/cart/goods');
        } else {
            $params = [
                'goodId' => $id,
                'userId' => $userId,
                'goodPrice' => $good->getGoodPrice(),
                'goodQuantity' => $good->getGoodQuantity() - 1,
                'goodName' => $good->getGoodName(),
                'goodDescription' => $good->getGoodDescription()
            ];
            $newGood->save($params, $id);
            return $this->redirect();
        }
    }
}