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

    public function delGoodsInCart($id)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE `user_id` = :id;";
        $this->bd->execute($sql, [':id' => $id]);
    }
}