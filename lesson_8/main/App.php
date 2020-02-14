<?php

namespace App\main;

use App\services\BD;
use App\traits\TSingleton;

/**
 * Class App
 * @package App\main
 * @property BD bd
 */
class App
{
    use TSingleton;
    private $config;
    private $componentsData;
    private $components = [];

    static public function call()
    {
        return static::getInstance();
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function getConfig($key)
    {
        if ($key == 'components') {
            return [];
        }
        return array_key_exists($key, $this->config)
            ? $this->config[$key]
            : [];
    }

    public function run($config)
    {
        $this->config = $config;
        $this->componentsData = $config['components'];
        $this->runController();
    }

    private function runController()
    {
        $request = new \App\services\Request();
        $controllerName = $request->getControllerName() ?: $this->config['defaultControllerName'];
        $actonName = $request->getActionName();

        $controllerClass = 'App\\controllers\\' . ucfirst($controllerName) . 'Controller';

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(
                new \App\services\renders\TwigRenderServices(),
                $request
            );
            $controller->run($actonName);
        }
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->components)) {
            return $this->components[$name];
        }

        if (array_key_exists($name, $this->componentsData)) {
            $class = $this->componentsData[$name]['class'];

            if (!class_exists($class)) {
                return null;
            }

            if (array_key_exists('config', $this->componentsData[$name])) {
                $config = $this->componentsData[$name]['config'];
                $component = new $class($config);
            } else {
                $component = new $class();
            }
            $this->components[$name] = $component;
            return $this->components[$name];

        }
        return null;
    }
}