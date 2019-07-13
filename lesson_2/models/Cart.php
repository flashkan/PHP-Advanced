<?php

namespace App\models;
class Cart extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $quantity;
    protected $userLog;

    /**
     * Возвращает стоку с названием таблицы из базы данных.
     * @return string Название таблицы.
     */
    public function getTableName()
    {
        return 'cart';
    }
}