<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../services/Autoload.php';
spl_autoload_register([new \App\services\Autoload(), 'loadClass']);

// использовал такой способ в учебных целях, что бы не городить код.
$array[] = new App\models\Users(new App\services\DB());
$array[] = new App\models\Goods(new App\services\DB());
$array[] = new App\models\Cart(new App\services\DB());
$array[] = new App\models\Orders(new App\services\DB());

foreach ($array as $elem) {
    echo $elem->get(5) . "<br>" .
        $elem->getAll() . "<hr>";
}
