<?php

use  App\models\User;
use  App\models\Good;

include $_SERVER['DOCUMENT_ROOT'] . '/../services/Autoload.php';

spl_autoload_register(
    [new Autoload(), 'loadClass']
);

$controllerName = $_GET['c'] ?: 'user';
$actonName = $_GET['a'];


$controllerClass = 'App\\controllers\\' .
    ucfirst($controllerName) . 'Controller';
if (class_exists($controllerClass)) {
    $controller = new $controllerClass;
    $controller->run($actonName);
}

//User::save(['Tom', 'user', 111, '123@123']);
//User::save(['John', 'admin', 333, '321@312'], 1);
//User::delete(3);
//$user = User::getOne(3);
//$user = User::getAll();
//var_dump($user);

//Good::save(['Sweep', 'good sweep', 50]);
//Good::save(['Chair', 'good chair', 2000]);
//Good::save(['Lamp', 'good lamp', 1000]);
//Good::save(['Notebook', 'good notebook', 40000], 1);
//Good::delete(5);
//$good = Good::getOne(1);
//$good = Good::getAll();
//var_dump($good);