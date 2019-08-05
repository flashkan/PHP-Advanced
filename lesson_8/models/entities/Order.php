<?php


namespace App\models\entities;


class Order extends Entity
{
    private $id;
    private $user_id;
    private $user_email;
    private $user_phone;
    private $user_address;
    private $total_price;
    private $order_data;
    private $order_status;
    private $order_json;

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
    public function getUserEmail()
    {
        return $this->user_email;
    }

    /**
     * @param mixed $user_email
     */
    public function setUserEmail($user_email)
    {
        $this->user_email = $user_email;
    }

    /**
     * @return mixed
     */
    public function getUserPhone()
    {
        return $this->user_phone;
    }

    /**
     * @param mixed $user_phone
     */
    public function setUserPhone($user_phone)
    {
        $this->user_phone = $user_phone;
    }

    /**
     * @return mixed
     */
    public function getUserAddress()
    {
        return $this->user_address;
    }

    /**
     * @param mixed $user_address
     */
    public function setUserAddress($user_address)
    {
        $this->user_address = $user_address;
    }

    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        return $this->total_price;
    }

    /**
     * @param mixed $total_price
     */
    public function setTotalPrice($total_price)
    {
        $this->total_price = $total_price;
    }

    /**
     * @return mixed
     */
    public function getOrderData()
    {
        return $this->order_data;
    }

    /**
     * @param mixed $order_data
     */
    public function setOrderData($order_data)
    {
        $this->order_data = $order_data;
    }

    /**
     * @return mixed
     */
    public function getOrderStatus()
    {
        return $this->order_status;
    }

    /**
     * @param mixed $order_status
     */
    public function setOrderStatus($order_status)
    {
        $this->order_status = $order_status;
    }


}