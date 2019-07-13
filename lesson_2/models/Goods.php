<?php

namespace App\models;
class Goods extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;

    /**
     * Возвращает стоку с названием таблицы из базы данных.
     * @return string Название таблицы.
     */
    public function getTableName()
    {
        return 'goods';
    }
}