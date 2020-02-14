<?php

namespace App\models\repositories;

use App\models\entities\Order;

class OrderRepository extends Repository
{
    protected function getColumnNames()
    {
        return $columnNames = ['user_id', 'user_email', 'user_phone', 'user_address', 'total_price', 'order_data',
            'order_status', 'order_json'];
    }

    protected function getTableName()
    {
        return 'orders';
    }

    protected function getEntityName()
    {
        return Order::class;
    }

    public function delOrders($id)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE `user_id` = :id;";
        $this->bd->execute($sql, [':id' => $id]);
    }
}