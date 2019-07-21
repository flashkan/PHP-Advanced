<?php
/**
 * @var \App\models\Good $good
 */
echo "
<div class='card' style='width: 40rem;'>
    <img src='http://dummyimage.com/720' class='card-img-top' alt='img'>
    <div class='card-body'>
        <p>{$good->getGoodName()}</p> 
        <p>{$good->getGoodDescription()}</p>
        <p>{$good->getGoodPrice()} руб</p>
    </div>
</div>";