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

    /**
     * Возвращает стоку с названием таблицы из базы данных.
     * @return string Название таблицы.
     */
    public function getTableName()
    {
        return 'orders';
    }
}