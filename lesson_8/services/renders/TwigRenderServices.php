<?php

namespace App\services\renders;

class TwigRenderServices implements IRenderServices
{

    public function renderTemp($template, $params = [])
    {
        $loader = new \Twig\Loader\FilesystemLoader([
            $_SERVER['DOCUMENT_ROOT'] . '/../views/twig',
            $_SERVER['DOCUMENT_ROOT'] . '/../views'
        ]);
        $twig = new \Twig\Environment($loader);
        return $twig->render($template . '.twig', $params);

    }
}