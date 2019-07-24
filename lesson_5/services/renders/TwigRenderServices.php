<?php

namespace App\services\renders;

class TwigRenderServices implements IRenderServices
{

    public function renderTemp($template, $params = [])
    {
        $loader = new \Twig\Loader\FilesystemLoader('..\views');
        $twig = new \Twig\Environment($loader);
        return $twig->render($template . '.php', $params);

    }
}