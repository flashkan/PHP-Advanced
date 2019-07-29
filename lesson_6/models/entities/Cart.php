<?php


namespace App\models\entities;


class Cart extends Entity
{
    private $id;
    private $user_id;
    private $good_price;
    private $good_quantity;
    private $good_name;
    private $good_description;

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
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
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

    /**
     * @return mixed
     */
    public function getGoodQuantity()
    {
        return $this->good_quantity;
    }

    /**
     * @param mixed $good_quantity
     */
    public function setGoodQuantity($good_quantity)
    {
        $this->good_quantity = $good_quantity;
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
}