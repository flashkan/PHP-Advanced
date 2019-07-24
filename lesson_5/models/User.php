<?php

namespace App\models;

class User extends Model
{
    private $id;
    private $user_name;
    private $user_login;
    private $user_pass;
    private $user_email;

    public static function getColumnNames()
    {
        return $columnNames = ['user_name', 'user_login', 'user_pass', 'user_email'];
    }

    public static function getTableName()
    {
        return 'users';
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
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }

    /**
     * @return mixed
     */
    public function getUserLogin()
    {
        return $this->user_login;
    }

    /**
     * @param mixed $user_login
     */
    public function setUserLogin($user_login)
    {
        $this->user_login = $user_login;
    }

    /**
     * @return mixed
     */
    public function getUserPass()
    {
        return $this->user_pass;
    }

    /**
     * @param mixed $user_pass
     */
    public function setUserPass($user_pass)
    {
        $this->user_pass = $user_pass;
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


}
