<?php


namespace App\services\renders;


interface IRenderServices
{
    public function renderTemp($template, $params = []);
}