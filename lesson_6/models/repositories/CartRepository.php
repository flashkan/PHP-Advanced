<?php

namespace App\models\repositories;

use App\models\entities\Cart;

class CartRepository extends Repository
{
    protected function getColumnNames()
    {
        return $columnNames = ['id', 'user_id', 'good_price', 'good_quantity', 'good_name', 'good_description'];
    }

    protected function getTableName()
    {
        return 'cart';
    }

    protected function getEntityName()
    {
        return Cart::class;
    }
}