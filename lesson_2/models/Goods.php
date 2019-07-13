<?php

namespace App\models;
class Goods extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;

    public function getTableName()
    {
        return 'goods';
    }
}