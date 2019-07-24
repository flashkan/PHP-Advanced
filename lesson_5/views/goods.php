<?php
/**
 * @var array $goods
 * @var \App\models\Good $good
 */
foreach ($goods as $good) {
    echo "<a href='?c=good&a=good&id={$good->getId()}' class='good m-1 p-3 col-3 d-flex flex-column align-items-center'><img src=\"http://dummyimage.com/120\" />
            <p>{$good->getGoodName()}</p> 
            <p>{$good->getGoodDescription()}</p>
            <p>{$good->getGoodPrice()} руб</p>
        </a>";
}