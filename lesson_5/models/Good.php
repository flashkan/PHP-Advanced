<?php

namespace App\models;

class Good extends Model
{
    private $id;
    private $good_name;
    private $good_description;
    private $good_price;

    protected static function getColumnNames()
    {
        return $columnNames = ['good_name', 'good_description', 'good_price'];
    }

    protected static function getTableName()
    {
        return 'goods';
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getGoodName()
    {
        return $this->good_name;
    }

    /**
     * @param mixed $good_name
     */
    public function setGoodName($good_name)
    {
        $this->good_name = $good_name;
    }

    /**
     * @return mixed
     */
    public function getGoodDescription()
    {
        return $this->good_description;
    }

    /**
     * @param mixed $good_description
     */
    public function setGoodDescription($good_description)
    {
        $this->good_description = $good_description;
    }

    /**
     * @return mixed
     */
    public function getGoodPrice()
    {
        return $this->good_price;
    }

    /**
     * @param mixed $good_price
     */
    public function setGoodPrice($good_price)
    {
        $this->good_price = $good_price;
    }
}


