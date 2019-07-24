<?php

use  App\models\User;
use  App\models\Good;

include $_SERVER['DOCUMENT_ROOT'] . '/../services/Autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';


spl_autoload_register(
    [new Autoload(), 'loadClass']
);

$controllerName = $_GET['c'] ?: 'good';
$actonName = $_GET['a'];


$controllerClass = 'App\\controllers\\' .
    ucfirst($controllerName) . 'Controller';
if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new \App\services\renders\TwigRenderServices());
    $controller->run($actonName);
}

//$user = new User();
//$user->save(['Tom', 'user', 111, '123@123']);
//$user->save(['111', 'admin', 333, '321@312'], 3);
//$user->delete(3);
//$user->getOne(3);
//$user->getAll();
//var_dump($user);

//$good = new Good();
//$good->save(['Lamp', 'good lamp', 1000]);
//$good->save(['Notebook', 'good notebook', 40000], 1);
//$good->delete(5);
//$good->getOne(1);
//$good->getAll();
//var_dump($good);