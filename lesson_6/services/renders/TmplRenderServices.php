<?php

namespace App\services\renders;

class TmplRenderServices implements IRenderServices
{
    public function renderTemp($template, $params = [])
    {
        ob_start();
        extract($params);
        include $_SERVER['DOCUMENT_ROOT'] . '/../views/' . $template . '.php';
        return ob_get_clean();
    }
}