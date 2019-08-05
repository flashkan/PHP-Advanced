<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';
$config = include $_SERVER['DOCUMENT_ROOT'] . '/../main/config.php';
\App\main\App::call()->run($config);


//$user = new \App\models\repositories\UserRepository();
//$user->save(['Tom', 'user', 111, '123@123']);
//$user->save(['111', 'admin', 333, '321@312'], 3);
//$user->delete(3);
//$user->getOne(3);
//$user->getAll();
//var_dump($user);

//$good = new GoodRepository();
//$good->save(['Lamp', 'good lamp', 1000]);
//$good->save(['Notebook', 'good notebook', 40000], 1);
//$good->delete(5);
//$good->getOne(1);
//$good->getAll();
//var_dump($good);