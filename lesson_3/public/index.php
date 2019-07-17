<?php
use  \App\models\User;
use  \App\services\BD;

include $_SERVER['DOCUMENT_ROOT'] . '/../services/Autoload.php';

spl_autoload_register(
    [new Autoload(), 'loadClass']
);

$user = new User();
//var_dump($user->getOne(3));
//var_dump($user->getAll());
//$user->save(['name' => 'John', 'login' => 'user', 'pass' => 111], 3);
//$user->save(['name' => 'Tom', 'login' => 'admin', 'pass' => 333]);
//$user->delete(6);