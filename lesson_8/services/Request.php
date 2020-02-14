<?php

namespace App\services;

use App\services\renders\TwigRenderServices;

class Request
{
    private $requestString;
    private $controllerName;
    private $actionName;
    private $id;
    private $params;
    public $userId;

    public function __construct()
    {
        session_start();
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }

    private function parseRequest()
    {
        $pattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";
        if (preg_match_all($pattern, $this->requestString, $matches)) {

            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];

            $this->params = [
                'get' => $_GET,
                'post' => $_POST
            ];

            $this->id = $this->getParams('get', 'id');
        }
    }

    /**
     * @return mixed
     */
    public function getRequestString()
    {
        return $this->requestString;
    }

    /**
     * @param mixed $requestString
     */
    public function setRequestString($requestString)
    {
        $this->requestString = $requestString;
    }

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @param mixed $controllerName
     */
    public function setControllerName($controllerName)
    {
        $this->controllerName = $controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @param mixed $actionName
     */
    public function setActionName($actionName)
    {
        $this->actionName = $actionName;
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


    public function getParams($method, $key)
    {
        if (empty($key)){
            return $this->params[$method];
        }
        return array_key_exists($key, $this->params[$method])
            ? $this->params[$method][$key]
            : null;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    public function getSession($key = null)
    {
        if (empty($key)){
            return $_SESSION;
        }
        return array_key_exists($key, $_SESSION)
            ? $_SESSION[$key]
            : null;
    }

    public function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }
}