<?php


namespace App\controllers;


use App\models\repositories\CartRepository;
use App\models\repositories\GoodRepository;

class CartController extends Controller
{
    public function goodAction()
    {
        $id = $this->request->getId();
        $params = [
            'good' => (new CartRepository())->getOne($id)
        ];
        echo $this->render('cartGood', $params);
    }

    public function goodsAction()
    {
        $params = [
            'goods' => (new CartRepository())->getAll()
        ];
        echo $this->render('cartGoods', $params);
    }

    public function addAction()
    {
        session_start();
        $userId = $_SESSION['userId'];
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
                header('Location: /');
                exit;
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
        header('Location: /');
        exit;
    }

    public function delAction()
    {
        $userId = 4;
        $id = $this->request->getId();
        $newGood = new CartRepository();
        $good = $newGood->getOne($id);
        if ($good->getGoodQuantity() == 1) {
            $newGood->delete($id);
            header("Location: /");
            exit;
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
            header('Location: /');
            exit;
        }
    }
}