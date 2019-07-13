<?php

namespace App\services;
class Autoload
{
    public function loadClass($class)
    {
        $result = preg_replace('/app/i', '', $class);
        $file = $_SERVER['DOCUMENT_ROOT'] . "/..$result.php";
        if (file_exists($file)) {
            include $file;
        }
    }
}