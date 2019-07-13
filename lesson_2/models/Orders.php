<?php

namespace App\models;
class Orders extends Model
{
    protected $id;
    protected $json;
    protected $totalPrice;
    protected $userLog;
    protected $data;
    protected $status;

    public function getTableName()
    {
        return 'orders';
    }
}