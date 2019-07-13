<?php

namespace App\models;
class Cart extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $quantity;
    protected $userLog;

    public function getTableName()
    {
        return 'cart';
    }
}