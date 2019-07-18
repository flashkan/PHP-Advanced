<?php
use  \App\models\User;
use  \App\models\Good;
use  \App\services\BD;

include $_SERVER['DOCUMENT_ROOT'] . '/../services/Autoload.php';

spl_autoload_register(
    [new Autoload(), 'loadClass']
);

$user = new User();
//var_dump($user->getOne(3));
// var_dump($user->getAll());
// $user->save(['name' => 'John', 'login' => 'user', 'pass' => 112], ['id' => 5]);
// $user->save(['name' => 'Gans', 'login' => 'admin', 'pass' => 222]);
$user->delete(['id' => 6]);

$good = new Good();
// $good->save(['good_name' => 'phone', 'good_price' => '10000'], ['good_id' => 2]);
// $good->save(['good_name' => 'book', 'good_price' => '1000']);
$good->delete(['good_id' => 3]);